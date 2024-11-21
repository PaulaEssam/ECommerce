@extends('admin.layouts.app')

@section('title')
<title>Products - E-commerce</title>
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
        <h1>Product List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right">
            <a href="{{route('add_product')}}" class="btn btn-primary">Add New Product</a>
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
                <h3 class="card-title">Product List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Brand</th>
                        <th>Old Price</th>
                        <th>Price</th>
                        <th>Created by</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->subcategory->name }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>{{ $product->old_price }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->user->name }}</td>
                            <td>{{ $product->status == 0 ? 'Active' : 'In Active' }}</td>
                            <td>
                                <a href="{{route('edit_product',$product->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('delete_product',$product->id)}}" class="btn btn-danger">Delete</a>
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
