@extends('layouts.app')
@section('title')
<title>Home - E-commerce</title>
@endsection
@section('content')
    <main class="main">
        <div class="intro-section bg-lighter pt-3 pb-6">
            <div class="container">
                @include('admin.layouts.messages')
<br> <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                            <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                                    "nav": false,
                                    "responsive": {
                                        "768": {
                                            "nav": true
                                        }
                                    }
                                }'>
                                @foreach($getSlider as $slider)
                                    @if (!empty($slider->image_name))
                                        <div class="intro-slide">
                                            <figure class="slide-image">
                                                <picture>
                                                    <source media="(max-width: 480px)" srcset="{{url('uploaded_files/slider/'.$slider->image_name)}}">
                                                    <img src="{{url('uploaded_files/slider/'.$slider->image_name)}}" alt="{{$slider->title}}">
                                                </picture>
                                            </figure>

                                            <div class="intro-content">
                                                <h1 class="intro-title">{{$slider->title}}</h1><!-- End .intro-title -->
                                                @if (!empty($slider->button_link) && !empty($slider->button_name))
                                                    <a href="{{$slider->button_link}}" class="btn btn-outline-white">
                                                        <span>{{$slider->button_name}}</span>
                                                        <i class="icon-long-arrow-right"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <span class="slider-loader"></span>
                        </div>
                    </div>

                </div>

                <div class="mb-6"></div>

                <div class="owl-carousel owl-simple" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": false,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            }
                        }
                    }'>
                    <a href="#" class="brand">
                        <img src="{{url('public/assets-home/images/brands/1.png')}}" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{url('public/assets-home/images/brands/2.png')}}" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{url('public/assets-home/images/brands/3.png')}}" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{url('public/assets-home/images/brands/4.png')}}" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{url('public/assets-home/images/brands/5.png')}}" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="{{url('public/assets-home/images/brands/6.png')}}" alt="Brand Name">
                    </a>
                </div>
            </div>
        </div>

        <div class="mb-6"></div>

        @if(!empty($getTrendyProducts->count()))
            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">Trendy Products</h2>
                </div>

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                            @foreach ($getTrendyProducts as $product)
                            @php
                            //الفانكشن موجودة في البروداكت موديل
                                $productImage = $product->getSingleImage($product->id);
                            @endphp

                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="{{url($product->slug)}}">
                                            @if(!empty($productImage))
                                                <img style="height: 280px; width:100%; object-fit: cover" src="{{url('uploaded_files/products/'.$productImage->image_name)}}" alt="{{$product->title}}" class="product-image">
                                            @endif
                                        </a>

                                    </figure>

                                    <div class="product-body">
                                        <div class="product-cat">
                                            @if(!empty($subCategory->name))
                                                <a href="{{url($product->category->slug . '/' .$product->subcategory->slug)}}">{{$product->subcategory->name}}</a>
                                            @else
                                            <a href="{{url($product->category->slug) }}">{{$product->category->name}}</a>
                                            @endif
                                        </div>
                                        <h3 class="product-title"><a href="{{url($product->slug)}}">{{$product->title}}</a></h3>
                                        <div class="product-price">
                                            ${{number_format($product->price, 2)}}
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($getCategory->count()))
            <div class="container categories pt-6">
                <h2 class="title-lg text-center mb-4">Shop by Categories</h2><!-- End .title-lg text-center -->
                <div class="row">
                    @foreach($getCategory as $cat)
                    @if(!empty($cat->image_name))
                        <div class="col-sm-12 col-lg-4 banners-sm">
                            <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                                <a href="{{$cat->slug}}">
                                    <img src="{{url('uploaded_files/category/'.$cat->image_name)}}" alt="{{$cat->name}}" style="width:350px; height: 300px;">
                                </a>

                                <div class="banner-content banner-content-center">
                                    <h3 class="banner-title text-white"><a href="{{$cat->slug}}">{{$cat->name}}</a></h3>
                                    <a href="{{$cat->slug}}" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
        @endif


        </div>

        <div class="mb-5"></div><!-- End .mb-6 -->


        <div class="container">
            <div class="heading heading-center mb-6">
                <h2 class="title">Recent Arrivals</h2><!-- End .title -->

                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
                    </li>
                    @foreach($getCategory as $cat)
                    <li class="nav-item">
                        <a class="nav-link getCategoryProduct" data-val="{{$cat->id}}" id="top-{{$cat->slug}}-link" data-toggle="tab" href="#top-{{$cat->slug}}-tab" role="tab" aria-controls="top-{{$cat->slug}}-tab" aria-selected="false">{{$cat->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">

                        <div class="products">
                            @include('product.filter_list')
                        </div>
                        <div class="more-container text-center">
                            <a href="{{url('search')}}" class="btn btn-outline-darker btn-more"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
                        </div>

                </div>
                @foreach($getCategory as $cat)
                    <div class="tab-pane p-0 fade getCatProduct{{$cat->id}}" id="top-{{$cat->slug}}-tab" role="tabpanel" aria-labelledby="top-{{$cat->slug}}-link">

                    </div>
                @endforeach

            </div>

        </div><!-- End .container -->

        <div class="container">
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                            <p>Free shipping for orders over $50</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rotate-left"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                            <p>Free 100% money back guarantee</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-life-ring"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                            <p>Alway online feedback 24/7</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->
            </div><!-- End .row -->

            <div class="mb-2"></div><!-- End .mb-2 -->
        </div>

        @if(!empty($getBlog->count()))
            <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
                <div class="container">
                    <h2 class="title-lg text-center mb-3 mb-md-4">From Our Blog</h2><!-- End .title-lg text-center -->

                    <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>
                        @foreach ($getBlog as $blog)
                            <article class="entry entry-display">
                                <figure class="entry-media">
                                    <a href="single.html">
                                        <img src="{{url('uploaded_files/blog/'.$blog->image_name)}}" alt="{{$blog->title}}" style="height: 250px">
                                    </a>
                                </figure>

                                <div class="entry-body pb-4 text-center">
                                    <div class="entry-meta">
                                        <a href="{{url('blog/'.$blog->slug)}}">{{date('M d-Y')}}</a>, {{$blog->getCommentCount()}} Comments
                                    </div><!-- End .entry-meta -->

                                    <h3 class="entry-title">
                                        <a href="{{url('blog/'.$blog->slug)}}">{{$blog->title}}</a>
                                    </h3><!-- End .entry-title -->

                                    <div class="entry-content">
                                        <p>{{$blog->description}} </p>
                                        <a href="{{url('blog/'.$blog->slug)}}" class="read-more">Read More</a>
                                    </div><!-- End .entry-content -->
                                </div><!-- End .entry-body -->
                            </article>
                        @endforeach


                    </div><!-- End .owl-carousel -->
                </div><!-- container -->

                <div class="more-container text-center mb-0 mt-3">
                    <a href="{{url('blog')}}" class="btn btn-outline-darker btn-more"><span>View more articles</span><i class="icon-long-arrow-right"></i></a>
                </div><!-- End .more-container -->
            </div>
        @endif

        <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url(public/assets-home/images/backgrounds/cta/bg-6.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9 col-xl-8">
                        <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                            <div class="col">
                                <h3 class="cta-title text-white">Sign Up & Get 10% Off</h3><!-- End .cta-title -->
                                <p class="cta-desc text-white">Molla presents the best in interior design</p><!-- End .cta-desc -->
                            </div><!-- End .col -->

                            <div class="col-auto">
                                <a href="login.html" class="btn btn-outline-white"><span>SIGN UP</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .col-auto -->
                        </div><!-- End .row no-gutters -->
                    </div><!-- End .col-md-10 col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cta -->
    </main><!-- End .main -->
@endsection
@section('script')
<script>
    $('body').delegate('.getCategoryProduct','click',function(){
        var cat_id = $(this).attr('data-val');

        $.ajax({
            url : "{{url('recent_arrival_category_products')}}",
            type:"POST",
            data:
            {
                "_token": "{{ csrf_token() }}",
                cat_id: cat_id,
            },
            dataType: "json",
            success:function(data){
                $('.getCatProduct'+cat_id).html(data.success)
            }
        });
    });
</script>
@endsection
