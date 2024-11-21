<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingChargeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductHomeController;
use App\Http\Controllers\UserController;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





// ADMIN
Route::get('admin',[AuthController::class, 'login'])->name('login');
Route::post('admin/login',[AuthController::class, 'admin_login'])->name('admin_login');

Route::get('admin/logout',[AuthController::class, 'admin_logout'])->name('admin_logout');

Route::group(['middleware' => 'admin' ], function(){

    Route::get('admin/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/admin/list',[AdminController::class, 'list'])->name('admin_list');
    Route::get('admin/admin/add',[AdminController::class, 'add'])->name('add_admin');
    Route::post('admin/admin/insert',[AdminController::class, 'insert'])->name('insert_admin');
    Route::get('admin/admin/edit/{id}',[AdminController::class, 'edit'])->name('edit_admin');
    Route::post('admin/admin/update/{id}',[AdminController::class, 'update'])->name('update_admin');
    Route::get('admin/admin/delete/{id}',[AdminController::class, 'delete'])->name('delete_admin');

    Route::get('admin/customer/list',[AdminController::class, 'customer_list']);
    Route::get('admin/customer/delete/{id}',[AdminController::class, 'delete_customer'])->name('delete_customer');

    Route::get('admin/orders/list',[OrderController::class, 'list'])->name('orders_list');
    Route::get('admin/orders/details/{id}',[OrderController::class, 'order_details'])->name('order_details');
    Route::get('admin/orders/delete/{id}',[OrderController::class, 'order_delete'])->name('order_delete');
    Route::get('admin/order_status',[OrderController::class, 'order_status']);

    Route::get('admin/category/list',[CategoryController::class, 'list'])->name('category_list');
    Route::get('admin/category/add',[CategoryController::class, 'add'])->name('add_category');
    Route::post('admin/category/insert',[CategoryController::class, 'insert'])->name('insert_category');
    Route::get('admin/category/edit/{id}',[CategoryController::class, 'edit'])->name('edit_category');
    Route::post('admin/category/update/{id}',[CategoryController::class, 'update'])->name('update_category');
    Route::get('admin/category/delete/{id}',[CategoryController::class, 'delete'])->name('delete_category');

    Route::get('admin/blog-category/list',[BlogCategoryController::class, 'list']);
    Route::get('admin/blog-category/add',[BlogCategoryController::class, 'add']);
    Route::post('admin/blog-category/insert',[BlogCategoryController::class, 'insert']);
    Route::get('admin/blog-category/edit/{id}',[BlogCategoryController::class, 'edit']);
    Route::post('admin/blog-category/update/{id}',[BlogCategoryController::class, 'update']);
    Route::get('admin/blog-category/delete/{id}',[BlogCategoryController::class, 'delete']);

    Route::get('admin/blog/list',[BlogController::class, 'list']);
    Route::get('admin/blog/add',[BlogController::class, 'add']);
    Route::post('admin/blog/insert',[BlogController::class, 'insert']);
    Route::get('admin/blog/edit/{id}',[BlogController::class, 'edit']);
    Route::post('admin/blog/update/{id}',[BlogController::class, 'update']);
    Route::get('admin/blog/delete/{id}',[BlogController::class, 'delete']);

    Route::get('admin/subCategory/list',[SubCategoryController::class, 'list'])->name('subCategory_list');
    Route::get('admin/subCategory/add',[SubCategoryController::class, 'add'])->name('add_subCategory');
    Route::post('admin/subCategory/insert',[SubCategoryController::class, 'insert'])->name('insert_subCategory');
    Route::get('admin/subCategory/edit/{id}',[SubCategoryController::class, 'edit'])->name('edit_subCategory');
    Route::post('admin/subCategory/update/{id}',[SubCategoryController::class, 'update'])->name('update_esubCategory');
    Route::get('admin/subCategory/delete/{id}',[SubCategoryController::class, 'delete'])->name('delete_subCategory');
    //ajax
    Route::post('admin/get_sub_category',[SubCategoryController::class, 'get_sub_category'])->name('get_sub_category');

    Route::get('admin/brand/list',[BrandController::class, 'list'])->name('brand_list');
    Route::get('admin/brand/add',[BrandController::class, 'add'])->name('add_brand');
    Route::post('admin/brand/insert',[BrandController::class, 'insert'])->name('insert_brand');
    Route::get('admin/brand/edit/{id}',[BrandController::class, 'edit'])->name('edit_brand');
    Route::post('admin/brand/update/{id}',[BrandController::class, 'update'])->name('update_brand');
    Route::get('admin/brand/delete/{id}',[BrandController::class, 'delete'])->name('delete_brand');

    Route::get('admin/color/list',[ColorController::class, 'list'])->name('color_list');
    Route::get('admin/color/add',[ColorController::class, 'add'])->name('add_color');
    Route::post('admin/color/insert',[ColorController::class, 'insert'])->name('insert_color');
    Route::get('admin/color/edit/{id}',[ColorController::class, 'edit'])->name('edit_color');
    Route::post('admin/color/update/{id}',[ColorController::class, 'update'])->name('update_color');
    Route::get('admin/color/delete/{id}',[ColorController::class, 'delete'])->name('delete_color');

    Route::get('admin/product/list',[ProductController::class, 'list'])->name('product_list');
    Route::get('admin/product/add',[ProductController::class, 'add'])->name('add_product');
    Route::post('admin/product/insert',[ProductController::class, 'insert'])->name('insert_product');
    Route::get('admin/product/edit/{id}',[ProductController::class, 'edit'])->name('edit_product');
    Route::post('admin/product/update/{id}',[ProductController::class, 'update'])->name('update_product');
    Route::get('admin/product/delete/{id}',[ProductController::class, 'delete'])->name('delete_product');
    Route::get('admin/product/deleteImage/{id}',[ProductController::class, 'deleteImage'])->name('deleteImageProduct');

    Route::get('admin/DiscountCode/list',[DiscountCodeController::class, 'list'])->name('discount_code_list');
    Route::get('admin/DiscountCode/add',[DiscountCodeController::class, 'add'])->name('add_discount_code');
    Route::post('admin/DiscountCode/insert',[DiscountCodeController::class, 'insert'])->name('insert_discount_code');
    Route::get('admin/DiscountCode/edit/{id}',[DiscountCodeController::class, 'edit'])->name('edit_discount_code');
    Route::post('admin/DiscountCode/update/{id}',[DiscountCodeController::class, 'update'])->name('updatediscount_code');
    Route::get('admin/DiscountCode/delete/{id}',[DiscountCodeController::class, 'delete'])->name('delete_discount_code');

    Route::get('admin/ShippingCharge/list',[ShippingChargeController::class, 'list'])->name('shipping_charge_list');
    Route::get('admin/ShippingCharge/add',[ShippingChargeController::class, 'add'])->name('add_shipping_charge');
    Route::post('admin/ShippingCharge/insert',[ShippingChargeController::class, 'insert'])->name('insert_shipping_charge');
    Route::get('admin/ShippingCharge/edit/{id}',[ShippingChargeController::class, 'edit'])->name('edit_shipping_charge');
    Route::post('admin/ShippingCharge/update/{id}',[ShippingChargeController::class, 'update'])->name('update_shipping_charge');
    Route::get('admin/ShippingCharge/delete/{id}',[ShippingChargeController::class, 'delete'])->name('delete_shipping_charge');

    Route::get('admin/slider/list',[SliderController::class, 'list']);
    Route::get('admin/slider/add',[SliderController::class, 'add']);
    Route::post('admin/slider/insert',[SliderController::class, 'insert']);
    Route::get('admin/slider/edit/{id}',[SliderController::class, 'edit']);
    Route::post('admin/slider/update/{id}',[SliderController::class, 'update']);
    Route::get('admin/slider/delete/{id}',[SliderController::class, 'delete']);

    Route::get('admin/page/list',[PageController::class, 'list']);
    Route::get('admin/page/edit/{id}',[PageController::class, 'edit'])->name('edit_page');
    Route::post('admin/page/update/{id}',[PageController::class, 'update'])->name('updatePage');
    Route::get('admin/Page/delete/{id}',[PageController::class, 'delete'])->name('delete_page');
    Route::get('admin/system-settings',[PageController::class, 'system_settings']);
    Route::post('admin/system-settings',[PageController::class, 'update_system_settings'])->name('update_system_settings');

    Route::get('admin/contact',[PageController::class, 'contact']);
    Route::get('admin/delete-message/{id}',[PageController::class, 'delete_message'])->name('delete_message');


}) ;

Route::group(['middleware' => 'user'], function () {
    Route::get('user/dashboard',[UserController::class, 'dashboard']);
    Route::get('user/orders',[UserController::class, 'orders']);
    Route::get('user/edit-profile',[UserController::class, 'edit_profile']);
    Route::post('user/edit-profile',[UserController::class, 'update_profile'])->name('update_profile');
    Route::get('user/change-password',[UserController::class, 'change_password']);
    Route::post('user/change-password',[UserController::class, 'update_password'])->name('update_password');
    Route::post('user/add_to_wishlist',[UserController::class, 'add_to_wishlist'])->name('add_to_wishlist');
    Route::get('user/orders/details/{id}',[UserController::class, 'user_order_details'])->name('user_order_details');
    Route::get('my-wishlist',[ProductHomeController::class, 'my_wishlist']);
    Route::post('blog/submit_comment',[HomeController::class, 'submit_blog_comment']);

/*
    *علامة ال ؟ اللي بعد المتغير اللي ف الراوت دي معنها ان المتغير ده مش ضروري يتحط يعني ممكن يتبعت من اللينك وممكن لا
    *مرة القسم بس وممكن تاني ابعت الفسم الفرعي وبالتالي هيتبعت معاه القسم تلقائي  url  بطريقة اوضح يعني انا ممكن ابعت ف ال
 */
// payment controller
Route::get('cart',[PaymentController::class,'cart']);
Route::post('product/add-to-cart',[PaymentController::class, 'add_to_cart']);
Route::post('update_cart', [PaymentController::class, 'update_cart']);
Route::get('cart/delete/{cart_id}',[PaymentController::class, 'cart_delete']);
Route::get('checkout', [PaymentController::class, 'checkout']);
Route::post('checkout/applay_discount_code', [PaymentController::class, 'applayDiscountCode']);
Route::post('checkout/place_order', [PaymentController::class, 'place_order']);
Route::get('checkout/payment',[PaymentController::class, 'checkout_payment']);
// Route::get('paypal/success-payment',[PaymentController::class, 'paypal_success_payment']);
});
Route::get('/',[HomeController::class,'home'])->name('home');
Route::post('recent_arrival_category_products',[HomeController::class,'recent_arrival_category_products']);
Route::get('contact',[HomeController::class,'contact']);
Route::post('contact',[HomeController::class,'submit_contact'])->name('submit_contact');
Route::get('about',[HomeController::class,'about']);
Route::get('fag',[HomeController::class,'fag']);
Route::get('blog',[HomeController::class,'blog']);
Route::get('blog/{slug}',[HomeController::class,'blog_detail']);
Route::get('blog/category/{slug}',[HomeController::class,'blog_category']);


Route::post('auth_login',[AuthController::class,'auth_login']);
Route::post('auth_register',[AuthController::class,'auth_register']);
Route::get('user/logout',[AuthController::class, 'user_logout'])->name('user_logout');



// product controller
Route::get('search',[ProductHomeController::class, 'getProductSearch']);
Route::get('{category?}/{subCategory?}',[ProductHomeController::class, 'getCategory']);
Route::post('get_filter_product_ajax',[ProductHomeController::class, 'getFilterProductAjax']);

