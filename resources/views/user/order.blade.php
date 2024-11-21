
@extends('layouts.app')
@section('title')
<title>User Orders | E-Commerce</title>
@endsection
@section('style')
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/owl-carousel/owl.carousel.css')}}">
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/magnific-popup/magnific-popup.css')}}">
<link rel="stylesheet" href="{{url('public/assets-home/css/plugins/nouislider/nouislider.css')}}">

@endsection
@section('content')
<main class="main">
    <div class="page-header text-center">
        <div class="container">
            <h1 class="page-title">Orders</h1>
        </div>
    </div>


    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <br>
                <div class="row">
                    @include('user.side_bar')
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content " style="overflow: auto">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Number</th>
                                    <th>Total Amount ($)</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders  as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ number_format($order->total_amount,2) }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>
                                                @if($order->status == 0 )
                                                    Pending
                                                @elseif ($order->status == 1 )
                                                    In progress
                                                @elseif ($order->status == 2 )
                                                    Delivered
                                                @elseif ($order->status == 3 )
                                                    Completed
                                                @elseif ($order->status == 4 )
                                                    Cancelled
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y h:i A',strtotime($order->created_at)) }}</td>
                                            <td>
                                                <a href="{{route('user_order_details',$order->id)}}" class="btn btn-primary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{$orders->links('pagination::bootstrap-5')}}
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
