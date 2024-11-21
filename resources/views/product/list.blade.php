
@extends('layouts.app')
@section('title')
<title>List - E-commerce</title>
@endsection
@section('style')
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/owl-carousel/owl.carousel.css')}}">
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/magnific-popup/magnific-popup.css')}}">
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/nouislider/nouislider.css')}}">
<style type="text/css">
    .active-color{
        border:3px solid #000 !important;
    }
</style>
@endsection
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('public/assets-home/images/page-header-bg.jpg')">
        <div class="container">
            @if (!empty($subCategory))
                <h1 class="page-title">{{$category->name }}  > {{ $subCategory->name}}</h1>
            @elseif(!empty($category))
                <h1 class="page-title">{{$category->name}}</h1>
            @else
                {{-- Request::get('q') = الحاجة اللي بابحث عنها ,,, يعني الكلام اللي باكتبه في حانة البحث --}}
                <h1 class="page-title">Search for >> {{Request::get('q')}} </h1>
            @endif
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
                @if (!empty($subCategory) && !empty($category))
                    <li class="breadcrumb-item" aria-current="page"><a href="{{url($category->slug)}}">{{$category->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$subCategory->name}}</li>
                @elseif(!empty($category))
                    <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                @endif
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Showing <span>{{$getProduct->perPage()}} of {{$getProduct->total()}}</span> Products
                            </div>
                        </div>

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control changeSortBy">
                                        <option value="">Select</option>
                                        <option value="popularity">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->

                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div id="getProductAjax">
                        @include('product.filter_list')
                    </div>
                    <div style="text-align: center">
                        <a href="javascript:;" @if (empty($page)) style="display: none;" @endif data-page="{{$page}}" class="btn btn-primary LoadMore">Load More</a>
                    </div>

                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3 order-lg-first">
                    <form method="POST" id="FilterForm">
                        {{ csrf_field() }}

                        <input type="hidden" value="{{!empty($category) ? $category->id : '' }}" name="old_category_id">
                        <input type="hidden" value="{{!empty($subCategory) ? $subCategory->id : '' }}" name="old_subCategory_id">
                        {{-- في الحاجة اللي بابحث عليها بس مش كل المنتجات تيجي  ajax هنا الانبوت الخاص بالبحث باقوله استخدم ال  --}}
                        <input type="hidden" value="{{!empty(Request::get('q')) ? Request::get('q') : '' }}" name="q">
                        <input type="hidden" id="get_subCategory_id" name="subCategory_id">
                        <input type="hidden" id="get_brand_id" name="brand_id">
                        <input type="hidden" id="get_color_id" name="color_id">
                        <input type="hidden" id="get_sortBy_id" name="sortBy_id">
                        <input type="hidden" id="get_start_price" name="start_price">
                        <input type="hidden" id="get_end_price" name="end_price">
                    </form>
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="#" class="sidebar-filter-clear">Clean All</a>
                        </div><!-- End .widget widget-clean -->
                        @if(!empty($getSubCatFilters))
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">
                                            @foreach($getSubCatFilters as $subFilter)
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input changeCategory"
                                                            id="cat-{{$subFilter->id}}" value="{{$subFilter->id}}">
                                                        <label class="custom-control-label" for="cat-{{$subFilter->id}}">{{$subFilter->name}}</label>
                                                    </div>
                                                    {{-- totalProduct() exist in subCategory Model !! --}}
                                                    <span class="item-count">{{$subFilter->totalProduct()}}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (!empty($getColorFilters))
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                        Colour
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-3">
                                    <div class="widget-body">
                                        <div class="filter-colors">
                                            @foreach($getColorFilters as $colorFilter)
                                                <a href="javascript:;" class="changeColor"
                                                    id="{{$colorFilter->id}}" style="background:{{$colorFilter->code}}"
                                                    data-val="0">
                                                    <span class="sr-only">{{$colorFilter->name}}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(!empty($geBrandFilters))
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                        Brand
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-4">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            @foreach($geBrandFilters as $brandFilter)
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input changeBrand"
                                                        id="brand-{{$brandFilter->id}}" value="{{$brandFilter->id}}">
                                                        <label class="custom-control-label" for="brand-{{$brandFilter->id}}">{{$brandFilter->name}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                    Price
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Price Range:
                                            <span id="filter-price-range"></span>
                                        </div>

                                        <div id="price-slider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
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
<script type="text/javascript">

    $('.changeSortBy').change(function(){
                var id = $(this).val()
        $('#get_sortBy_id').val(id);
        FilterForm();
    });

    $('.changeCategory').change(function(){
        var ids = '';
        $('.changeCategory').each(function(){
            if(this.checked){
                var id = $(this).val()
                ids += id + ',';
            }
        });
        $('#get_subCategory_id').val(ids);
        FilterForm();
    });

    $('.changeBrand').change(function(){
        var ids = '';
        $('.changeBrand').each(function(){
            if(this.checked){
                var id = $(this).val()
                ids += id + ',';
            }
        });
        $('#get_brand_id').val(ids);
        FilterForm();
    });

    $('.changeColor').click(function(){
        var id = $(this).attr('id');
        var status = $(this).attr('data-val');
        if(status == 0){
            $(this).attr('data-val',1);
            $(this).addClass('active-color');
        }
        else{
            $(this).attr('data-val',0);
            $(this).removeClass('active-color');
        }

        var ids = '' ;
        $('.changeColor').each(function(){
            var status = $(this).attr('data-val');
            if(status == 1){
                var id = $(this).attr('id')
                ids += id + ',';
            }
        });
        $('#get_color_id').val(ids);
        FilterForm();
    });
    var xhr ;
    function FilterForm(){
        if(xhr && xhr.readyState != 4){
            xhr.abort();
        }
        xhr = $.ajax({
            type: 'POST',
            url: "{{url('get_filter_product_ajax')}}",
            data: $('#FilterForm').serialize(),
            dataType: 'json',
            success: function(data){
                $('#getProductAjax').html(data.success);
                $('.LoadMore').attr('data-page', data.page);
                if(data.page == 0){
                    $('.LoadMore').hide();
                }
                else{
                    $('.LoadMore').show();

                }
            },
            error: function(data){

            },
        });
    }

    $('body').delegate('.LoadMore','click', function(){
        var page = $(this).attr('data-page');
        $('.LoadMore').html('Loading...');

        if(xhr && xhr.readyState != 4){
            xhr.abort();
        }
        xhr = $.ajax({
            type: 'POST',
            url: "{{url('get_filter_product_ajax')}}?page="+page,
            data: $('#FilterForm').serialize(),
            dataType: 'json',
            success: function(data){
                $('#getProductAjax').html(data.success)
                $('.LoadMore').attr('data-page', data.page);
                $('.LoadMore').html('Load More');

                if(data.page == 0){
                    $('.LoadMore').hide();
                }
                else{
                    $('.LoadMore').show();

                }
            },
            error: function(data){
            },
        });
    });

    var i = 0 ;
    // Slider For category pages / filter price
    if ( typeof noUiSlider === 'object' ) {
		var priceSlider  = document.getElementById('price-slider');

		noUiSlider.create(priceSlider, {
			start: [ 0, 1000 ],
			connect: true,
			step: 1,
			margin: 1,
			range: {
				'min': 0,
				'max': 1000
			},
			tooltips: true,
			format: wNumb({
                    decimals: 0,
                    prefix: '$'
                })
		});

		// Update Price Range
		priceSlider.noUiSlider.on('update', function( values, handle ){
            var start_price = values[0];
            var end_price = values[1];
            $('#get_start_price').val(start_price);
            $('#get_end_price').val(end_price);
			$('#filter-price-range').text(values.join(' - '));
            if (i == 0 || i == 1) {
                i++ ;
            }
            else{
                FilterForm();
            }
		});
	}
</script>
@endsection
