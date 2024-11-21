@extends('admin.layouts.app')

@section('title')
<title>Shipping Charge  - E-commerce</title>
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
        <h1>Shipping Charge List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right">
            <a href="{{route('add_shipping_charge')}}" class="btn btn-primary">Add New Shipping Charge</a>
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
                <h3 class="card-title">Shipping Charge List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Craeted Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($ShippingCharge as $charge)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $charge->name }}</td>
                                <td>{{ $charge->price }}</td>
                                <td>{{ date('d-m-Y',strtotime($charge->created_at)) }}</td>
                                <td>{{ $charge->status == 0 ? 'Active' : 'In Active' }}</td>
                                <td>
                                    <a href="{{route('edit_shipping_charge',$charge->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('delete_shipping_charge',$charge->id)}}" class="btn btn-danger">Delete</a>
                                </td>
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
