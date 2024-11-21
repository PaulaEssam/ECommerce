
@extends('layouts.app')
@section('title')
<title>Cart - E-commerce</title>
@endsection
@section('style')
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/owl-carousel/owl.carousel.css')}}">
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/magnific-popup/magnific-popup.css')}}">
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/nouislider/nouislider.css')}}">

@endsection
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{url('public/assets-home/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
            @include('admin.layouts.messages')

                @if(!empty(Cart::getContent()->count()))
                    <div class="row">
                        <div class="col-lg-9">
                            <form action="{{url('update_cart')}}" method="POST">
                                @csrf
                                <table class="table table-cart table-mobile">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach (Cart::getContent() as $key=> $cart)
                                            @php
                                                $product = App\Models\Product::find($cart->id);
                                            @endphp
                                            @if(!empty($product))
                                                <tr>
                                                    <td class="product-col">
                                                        <div class="product">
                                                            <figure class="product-media">
                                                                <a href="{{url($product->slug)}}">
                                                                    <img src="{{url('uploaded_files/products/'.$product->getSingleImage($product->id)->image_name)}}"  alt="{{$product->title}}">
                                                                </a>
                                                            </figure>

                                                            <h3 class="product-title">
                                                                <a href="{{url($product->slug)}}" style="margin-bottom: 10px; display: block">{{$product->title}}</a>
                                                                @php
                                                                    $color_id = $cart->attributes->color_id;
                                                                @endphp
                                                                @if(!empty($color_id))
                                                                    @php
                                                                        $getColor = App\Models\Color::find($color_id);
                                                                    @endphp
                                                                    <div><b>Color</b>: {{$getColor->name}} </div>
                                                                @endif

                                                                @php
                                                                    $size_id = $cart->attributes->size_id;
                                                                @endphp
                                                                @if(!empty($size_id))
                                                                    @php
                                                                        $getSize = App\Models\ProductSize::find($size_id);
                                                                    @endphp
                                                                    <div><b>Size</b>: {{$getSize->name}} <br> <b>Size Price</b>: ${{number_format($getSize->price,2)}} </div>
                                                                @endif

                                                            </h3>
                                                        </div>
                                                    </td>
                                                    <td class="price-col">${{number_format($cart->price,2)}}</td>
                                                    <td class="quantity-col">
                                                        <div class="cart-product-quantity">
                                                            <input type="number" name="cart[{{$key}}][qty]" class="form-control" value="{{$cart->quantity}}" min="1" max="100" step="1" data-decimals="0" required>
                                                            <input type="hidden" name="cart[{{$key}}][id]" value="{{$cart->id}}" >
                                                        </div>
                                                    </td>
                                                    <td class="total-col">${{number_format($cart->price * $cart->quantity,2)}}</td>
                                                    <td class="remove-col"><a href="{{url('cart/delete/'.$cart->id)}}" class="btn-remove"><i class="icon-close"></i></a></td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>

                                <div class="cart-bottom">
                                    <button type="submit" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
                                </div>
                            </form>
                        </div>
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3>

                                <table class="table table-summary">
                                    <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>${{number_format(Cart::getSubTotal(),2)}}</td>
                                        </tr>


                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>${{number_format(Cart::getSubTotal(),2)}}</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{url('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                            </div><!-- End .summary -->

                            <a href="{{url('')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div>
                @else
                    <p class="alert alert-primary">Cart Is Empty !!</p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
    <script src="{{url('public/assets-home/js/wNumb.js')}}"></script>
    <script src="{{url('public/assets-home/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{url('public/assets-home/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('public/assets-home/js/nouislider.min.js')}}"></script>
<script src="{{url('public/assets-home/js/nouislider.min.js')}}"></script>

@endsection
