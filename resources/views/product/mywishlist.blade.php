
@extends('layouts.app')
@section('title')
<title>My Wishlist - E-commerce</title>
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
            <h1 class="page-title">My Wishlist </h1>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">My Wishlist</a></li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Showing <span>{{$getProduct->perPage()}} of {{$getProduct->total()}}</span> Products
                            </div>
                        </div>
                    </div>

                    <div id="getProductAjax">
                        @include('product.filter_list');
                    </div>
                    <div class="col-lg 12">
                            {{$getProduct->links('pagination::bootstrap-5')}}
                    </div>
                </div>

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
