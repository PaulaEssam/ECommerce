
@extends('layouts.app')
@section('title')
<title>User Dashboard | E-Commerce</title>
@endsection
@section('style')
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/owl-carousel/owl.carousel.css')}}">
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/magnific-popup/magnific-popup.css')}}">
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/nouislider/nouislider.css')}}">
<style>
    .box-btn{
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        box-shadow: 0 0 1px rgba(0, 0, 0, .125),0 1px 3px rgba(0, 0, 0, .2);
    }
</style>
@endsection
@section('content')
<main class="main">
    <div class="page-header text-center">
        <div class="container">
            <h1 class="page-title">Dashboard</h1>
        </div>
    </div>


    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <br>
                <div class="row">
                    @include('user.side_bar')
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                                <div class="row">
                                    <div class="col-md-3" style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight: bold;">{{$getTotalOrders}}</div>
                                            <div style="font-size: 16px;">Total Orders</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight: bold;">{{$getTotalTodayOrders}} </div>
                                            <div style="font-size: 16px;">Today Orders</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight: bold;">${{number_format($getTotalAmount,2)}} </div>
                                            <div style="font-size: 16px;">Total Amount</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight: bold;">${{number_format($getTotalTodayAmount,2)}} </div>
                                            <div style="font-size: 16px;">Today Amount</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight: bold;">{{$totalPending}}</div>
                                            <div style="font-size: 16px;">Pending Orders</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight: bold;">{{$totalInprogress}}</div>
                                            <div style="font-size: 16px;">In Progress Orders</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight: bold;">{{$totalCompleted}}</div>
                                            <div style="font-size: 16px;">Completed Orders</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight: bold;">{{$totalCancelled}}</div>
                                            <div style="font-size: 16px;">Cancelled Orders</div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
    <script src="{{url('public/assets-home/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{url('public/assets-home/js/jquery.elevateZoom.min.js')}}"></script>
    <script src="{{url('public/assets-home/js/bootstrap-input-spinner.js')}}"></script>

@endsection
