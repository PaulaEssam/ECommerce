<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\DiscountCode;
use App\Models\Orders;
use App\Models\OrdersItem;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ShippingCharge;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Stripe\Discount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Can;
use Intervention\Image\Colors\Rgb\Channels\Red;

use function Laravel\Prompts\alert;

class PaymentController extends Controller
{
    public function cart(Request $request)
    {
        return view('payment.cart');
    }


    public function add_to_cart(Request $request)
    {
        $getProduct = Product::find($request->product_id);
        $total = $getProduct->price ;

        if (!empty($request->size_id)) {
            $size_id = $request->size_id ;
            $getSize = ProductSize::find($size_id);
            $size_price = !empty($getSize->price) ? $getSize->price : 0 ;
            $total += $size_price;
        }
        else{
            $size_id = 0;
        }

        $color_id = !empty($request->color_id ) ? $request->color_id : 0 ;
        Cart::add([
            'id' => $request->product_id,
            'name' => 'Product',
            'price' => $total,
            'quantity' => $request->qty,
            'attributes' => [
                'size_id' => $size_id,
                'color_id' => $color_id,
            ],
        ]);
        return redirect()->back()->with('success','Item added successfully into cart.');
    }

    public function update_cart(Request $request)
    {
        // dd($request->all());
        foreach($request->cart as $cart){
            Cart::update($cart['id'], array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $cart['qty']
                ),
            ));
        }
        return redirect()->back();

    }


    public function cart_delete($cart_id)
    {
        Cart::remove($cart_id);
        return redirect()->back();
    }

    public function checkout()
    {
        $getShipping = ShippingCharge::where('status',0)->get();
        return view('payment.checkout',compact('getShipping'));
    }

    public function applayDiscountCode(Request $request)
    {
        $getDiscountCode = DiscountCode::where('status',0)->where('name',$request->discount_code)->where('expire_date','>=',date('d-m-Y'))->first();

        if(!empty($getDiscountCode)){
            $total = Cart::getSubTotal();
            if( $getDiscountCode->type == 'Amount'){
                $discount_amount = $getDiscountCode->percent_amount;
                $payable_total = $total - $getDiscountCode->percent_amount;
            }
            else{
                $discount_amount = ($total * $getDiscountCode->percent_amount) / 100 ;
                $payable_total = $total - $discount_amount;
            }
            $json['status'] = true ;
            $json['discount_amount'] = number_format($discount_amount,2) ;
            $json['payable_total'] = $payable_total ;
            $json['message'] = 'success';
        }
        else{
            $json['status'] = false ;
            $json['discount_amount'] = '0.00' ;
            $json['payable_total'] = Cart::getSubTotal() ;
            $json['message'] = 'Discount code is not valid';
        }
        echo json_encode($json);
    }

    public function place_order(Request $request)
    {
        $getShipping = ShippingCharge::where('status',0)->where('id',$request->shipping)->first();

        $payable_total = Cart::getSubTotal();
        $discount_amount = 0 ;
        $discount_code = '' ;
        if (!empty($request->discount_code)) {
            $getDiscountCode = DiscountCode::where('status',0)->where('name',$request->discount_code)->where('expire_date','>=',date('d-m-Y'))->first();

            if(!empty($getDiscountCode)){
                $discount_code = $request->discount_code ;

                if( $getDiscountCode->type == 'Amount'){
                    $discount_amount = $getDiscountCode->percent_amount;
                    $payable_total = $payable_total - $getDiscountCode->percent_amount;
                }
                else{
                    $discount_amount = ($payable_total * $getDiscountCode->percent_amount) / 100 ;
                    $payable_total = $payable_total - $discount_amount;
                }
            }
        }

        $shipping_amount = !empty($getShipping->price) ? $getShipping->price : 0 ;


        $total_amount = $payable_total + $shipping_amount;
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        else{
            $user_id = '';
        }
        // $user_id = Auth::user()->id;
        // dd($user_id);
        // die ;
        if($user_id){
            $order = new Orders();
            $order->user_id = $user_id;
            $order->first_name = $request->first_name ;
            $order->last_name = $request->last_name ;
            $order->company_name = $request->company_name ;
            $order->country = $request->country ;
            $order->address_one = $request->address_one ;
            $order->address_two = $request->address_two ;
            $order->city = $request->city ;
            $order->state = $request->state ;
            $order->postcode = $request->postcode ;
            $order->phone = $request->phone ;
            $order->email = $request->email ;
            $order->notes = $request->notes ;
            $order->discount_code = $discount_code ;
            $order->discount_amount = $discount_amount ;
            $order->shipping_id = $request->shipping ;
            $order->shipping_amount = $shipping_amount ;
            $order->total_amount = $total_amount ;
            $order->payment_method = $request->payment_method ;
            $order->save();

            foreach(Cart::getContent() as $key => $cart)
            {
                $order_item = new OrdersItem();
                $order_item->order_id = $order->id ;
                $order_item->product_id = $cart->id ;
                $order_item->quantity = $cart->quantity ;
                $order_item->price = $cart->price ;
                $color_id = $cart->attributes->color_id;
                if(!empty($color_id))
                {
                    $getColor = Color::find($color_id);
                    $order_item->color_name = $getColor->name;
                }
                $size_id = $cart->attributes->size_id ;
                if(!empty(  $size_id))
                {
                    $getSize = ProductSize::find($size_id);
                    $order_item->size_name = $getSize->name ;
                    $order_item->size_amount = $getSize->price ;
                }
                $order_item->total_price = $cart->price * $cart->quantity;
                $order_item->save();
            }
            return redirect('checkout/payment?order_id='.base64_encode($order->id));
        }
        else{
            return redirect()->back()->with('error','please login first');
        }
    }

    public function checkout_payment(Request $request)
    {

        if(!empty(Cart::getSubTotal()) && !empty($request->order_id))
        {
            $order_id = base64_decode($request->order_id);
            $getOrder = Orders::find($order_id);
            if(!empty($getOrder))
            {

                if($getOrder->payment_method == 'cash'){
                    $getOrder->is_payment = 1 ;
                    $getOrder->save();
                    Cart::clear();
                    return redirect('cart')->with('success','Order placed successfully');
                }
                // elseif($getOrder->payment_method == 'PayPal'){
                //     $query = array();
                //     $query['business'] = 'paulaessam8@gmail.com'; // حساب البائع
                //     $query['cmd'] = '_xclick';
                //     $query['item_name'] = 'e-commerce';
                //     $query['no_shipping'] = '1';
                //     $query['item_number'] = $getOrder->id;
                //     $query['amount'] = $getOrder->total_amount ;
                //     $query['currency_code'] = 'USD';
                //     $query['cancel_return'] = url('checkout');
                //     $query['return'] = url('paypal/success-payment');
                //     $query_string = http_build_query($query);
                //     // header('Location: https://www.sandbox.paypal.com/cgi-bin/websr?' . $query_string);

                //     header('Location: https://www.paypal.com/cgi-bin/webscr?' . $query_string);
                //     exit();
                // }
                // elseif($getOrder->payment_method == 'Credit'){

                // }
            }
            else
            {
                abort(404);
            }
        }
        else
        {
            abort(404) ;
        }
    }

    // public function paypal_success_payment(Request $request)
    // {
    //     if(!empty($request->item_number) && !empty($request->st) && $request->st=='Completed'){
    //         $getOrder = Orders::find($request->item_number);
    //         if(!empty($getOrder)){
    //             $getOrder->is_payment = 1 ;
    //             $getOrder->transaction_id = $request->tx;
    //             $getOrder->payment_data = json_encode($request->all());
    //             $getOrder->save();
    //             Cart::clear();
    //             return redirect('cart')->with('success','Order placed successfully');
    //         }
    //         else
    //         {
    //             abort(404);
    //         }
    //     }
    //     else{
    //         abort(404);
    //     }
    // }
}
