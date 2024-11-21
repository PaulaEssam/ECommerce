
@extends('layouts.app')
@section('title')
<title>{{$getProduct->title}}</title>
@endsection
@section('style')
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/owl-carousel/owl.carousel.css')}}">
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/magnific-popup/magnific-popup.css')}}">
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/nouislider/nouislider.css')}}">

@endsection
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url($getProduct->category->slug)}}">{{$getProduct->category->name}}</a></li>
                <li class="breadcrumb-item"><a href="{{url($getProduct->category->slug . '/' .$getProduct->subCategory->slug)}}">{{$getProduct->subCategory->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$getProduct->title}}</li>
            </ol>

        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            @include('admin.layouts.messages')

            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery">
                            <figure class="product-main-image">
                                <img id="product-zoom" src="{{url('uploaded_files/products/'.$getProduct->getSingleImage($getProduct->id)->image_name)}}" data-zoom-image="{{url('uploaded_files/products/'.$getProduct->getSingleImage($getProduct->id)->image_name)}}" alt="{{$getProduct->title}}">

                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                    <i class="icon-arrows"></i>
                                </a>
                            </figure>

                            <div id="product-zoom-gallery" class="product-image-gallery">
                                @foreach ($getProduct->getImage as $img)
                                    <a class="product-gallery-item" href="#" data-image="{{url('uploaded_files/products/'.$img->image_name)}}" data-zoom-image="{{url('uploaded_files/products/'.$img->image_name)}}">
                                        <img src="{{url('uploaded_files/products/'.$img->image_name)}}" alt="product side">
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{$getProduct->title}}</h1><!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                <span id="getTotalPrice">${{number_format($getProduct->price,2)}}</span>
                            </div>
                            <div class="product-content">
                                <p>{{$getProduct->short_desc}}</p>
                            </div>
                            <form action="{{url('product/add-to-cart')}}" method="POST" >
                                @csrf
                                <input type="hidden" name="product_id" value="{{$getProduct->id}}">

                                {{-- getColor اللي ف موديل البروداكت --}}
                                @if (!empty($getProduct->getColor->count()))
                                    <div class="details-filter-row details-row-size">
                                        <label for="color_id">Color:</label>
                                        <div class="select-custom">
                                            <select name="color_id" id="color_id" required class="form-control">
                                                <option value="">Select a color</option>
                                                @foreach ($getProduct->getColor as $color)
                                                {{-- getColor اللي ف موديل البروداكت كلر  --}}
                                                    <option value="{{$color->getColor->id}}">{{$color->getColor->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                {{-- getSize اللي ف موديل البروداكت --}}
                                @if (!empty($getProduct->getSize->count()))
                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Size:</label>
                                        <div class="select-custom">
                                            <select name="size_id" id="size" required class="form-control getSizePrice">
                                                <option value="" data-price="0">Select a size</option>
                                                @foreach ($getProduct->getSize as $size)
                                                    <option data-price="{{!empty($size->price)?$size->price:0}}" value="{{$size->id}}">{{$size->name}} @if (!empty($size->price)) (${{number_format($size->price,2)}}) @endif </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                @endif

                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Qty:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" name="qty" required id="qty" class="form-control" value="1" min="1" max="100" step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->

                                <div class="product-details-action">
                                    <button type="submit" class="btn-product btn-cart">add to cart</button>

                                    <div class="details-action-wrapper">
                                        @if(!empty(Auth::check()))
                                            <a href="javascript:;" id="{{$getProduct->id}}"
                                                class="add-to-wishlist add-to-wishlist{{$getProduct->id}}  {{!empty(
                                            App\Models\ProductWishlist::where('user_id',Auth::user()->id)->
                                            where('product_id',$getProduct->id)->count()) ? 'btn-wishlist-add' : ''}}
                                                btn-product btn-wishlist"
                                                title="Wishlist">
                                                <span>Add to Wishlist</span>
                                            </a>
                                        @else
                                            <a href="#signin-modal" data-toggle="modal" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="{{url($getProduct->category->slug)}}">{{$getProduct->category->name}}</a>,
                                    <a href="{{url($getProduct->category->slug . '/' .$getProduct->subCategory->slug)}}">{{$getProduct->subCategory->name}}</a>

                                </div>

                                {{-- <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div> --}}
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->
        </div><!-- End .container -->

        <div class="product-details-tab product-details-extended">
            <div class="container">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                    </li>
                </ul>
            </div><!-- End .container -->

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                        <div class="container">
                            {!! $getProduct->desc !!}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                    <div class="product-desc-content">
                        <div class="container">
                            {!! $getProduct->additional_info !!}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                    <div class="product-desc-content">
                        <div class="container">
                            {!! $getProduct->shipping_returns !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h2 class="title text-center mb-4">You May Also Like</h2>
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                    "nav": false,
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                @foreach ($getRelatedProduct as $product)
                    <div class="product product-7">
                        <figure class="product-media">
                            <a href="{{url($product->slug)}}">
                                <img src="{{url('uploaded_files/products/'.$product->getSingleImage($product->id)->image_name)}}" alt="{{$product->title}}" class="product-image">
                            </a>
                        </figure>

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{url($product->category->slug . '/' .$product->subcategory->slug)}}">{{$product->subcategory->name}}</a>
                            </div>
                            <h3 class="product-title"><a href="{{url($product->slug)}}">{{$product->title}}</a></h3>
                            <div class="product-price">
                                ${{number_format($product->price, 2)}}
                            </div>
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 20%;"></div>
                                </div>
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
    <script src="{{url('public/assets-home/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{url('public/assets-home/js/jquery.elevateZoom.min.js')}}"></script>
    <script src="{{url('public/assets-home/js/bootstrap-input-spinner.js')}}"></script>
    <script>
        $('.getSizePrice').change(function(){
            var product_price = {{$getProduct->price}} ;
            var price = $('option:selected',this).attr('data-price');
            var total = parseFloat(product_price) + parseFloat(price);
            $('#getTotalPrice').html('$'+total.toFixed(2)) ;

        });
    </script>
@endsection
