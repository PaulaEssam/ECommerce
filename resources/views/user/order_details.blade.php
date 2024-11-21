
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
            <h1 class="page-title">Order Details</h1>
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
                            <div class="card-body">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Order ID: </label> <span>{{$order->id}}</span>
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold;">Name: </label> <span>{{$order->first_name}} {{$order->last_name}} </span>
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold;">Company Name:</label> <span>{{$order->company_name}}</span>
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold;">Country:</label> <span>{{$order->country}}</span>
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold;">Address:</label> <span>{{$order->address_one}} , {{$order->address_two}}</span>
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold;">City:</label> <span>{{$order->city}}</span>
                                </div>

                                <div class="form-group">
                                    <label style="font-weight: bold;">Postcode:</label> <span>{{$order->postcode}}</span>
                                </div>

                                <div class="form-group">
                                    <label style="font-weight: bold;">Phone:</label> <span>{{$order->phone}}</span>
                                </div>

                                <div class="form-group">
                                    <label style="font-weight: bold;">Email:</label> <span>{{$order->email}}</span>
                                </div>

                                <div class="form-group">
                                    <label style="font-weight: bold;">Discount Code:</label> <span>{{$order->discount_code}}</span>
                                </div>

                                <div class="form-group">
                                    <label style="font-weight: bold;">Discount Amount:</label> <span>${{number_format($order->discount_amount,2)}}</span>
                                </div>

                                <div class="form-group">
                                    <label style="font-weight: bold;">Shipping Name :</label> <span>{{$order->getShippingName->name }}</span>
                                </div>

                                <div class="form-group">
                                    <label style="font-weight: bold;">Shipping Amount:</label> <span>${{number_format($order->shipping_amount,2)}}</span>
                                </div>

                                <div class="form-group">
                                    <label style="font-weight: bold;">Total Amount:</label> <span>${{number_format($order->total_amount,2)}}</span>
                                </div>

                                <div class="form-group">
                                    <label style="font-weight: bold;">Payment Method:</label> <span>{{$order->payment_method}}</span>
                                </div>

                                <div class="form-group">
                                    <label style="font-weight: bold;">Status:</label>
                                    <span>
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
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label style="font-weight: bold;">Notes :</label> <span>{{$order->created_at}}</span>
                                </div>

                                <div class="form-group">
                                    <label style="font-weight: bold;">created_at:</label> <span>{{$order->created_at}}</span>
                                </div>

                            </div>

                            <div class="card">
                                <div class="card-header" style="margin-top: 20px;">
                                <h3 class="card-title">Product Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0" style="overflow: auto">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>QTY</th>
                                        <th>Price($)</th>
                                        <th>Color Name</th>
                                        <th>Size Name</th>
                                        <th>Size Amount($)</th>
                                        <th>Total Amount($)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        {{-- orderItems موجوده في الاوردر موديل --}}
                                        @foreach ($order->orderItems  as $product)
                                            <tr>
                                                <td>
                                                <img style="width: 100px;" src="{{url('uploaded_files/products/'.$product->getSingleImage($product->getProduct->id)->image_name)}}"  alt="{{$product->getProduct->title}}">
                                                </td>
                                                {{-- getProduct موديل الاوردر ايتمس --}}
                                                <td><a target="_blank" href="{{ url($product->getProduct->slug) }}">{{ $product->getProduct->title }}</a></td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>${{number_format( $product->price,2) }}</td>
                                                <td>{{ $product->color_name }}</td>
                                                <td>{{ $product->size_name }}</td>
                                                <td>${{ number_format($product->size_amount,2) }}</td>
                                                <td>${{ number_format($product->total_price,2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
