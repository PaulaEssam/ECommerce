@extends('admin.layouts.app')

@section('title')
<title>Order Details - E-commerce</title>
@endsection

@section('style')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Orders Details</h1>
        </div>

    </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.messages')

            <div class="card">
                <div class="card-header">
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
                        <th>Price</th>
                        <th>Color Name</th>
                        <th>Size Name</th>
                        <th>Size Amount($)</th>
                        <th>Total Amount($)</th>
                    </tr>
                    </thead>
                    <tbody>
                        {{-- orderItems موجوده في الاوردر موديل --}}
                        @foreach ($getRecord->orderItems  as $product)
                            <tr>
                                <td>
                                <img style="width: 100px;" src="{{url('uploaded_files/products/'.$product->getSingleImage($product->getProduct->id)->image_name)}}"  alt="{{$product->getProduct->title}}">
                                </td>
                                {{-- getProduct موديل الاوردر ايتمس --}}
                                <td><a target="_blank" href="{{ url($product->getProduct->slug) }}">{{ $product->getProduct->title }}</a></td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->color_name }}</td>
                                <td>{{ $product->size_name }}</td>
                                <td>{{ number_format($product->size_amount,2) }}</td>
                                <td>{{ number_format($product->total_price,2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>
</div>
@endsection

@section('script')
{{-- <script src="{{ url('public/assets/dist/js/pages/dashboard3.js')}}"></script> --}}

@endsection
