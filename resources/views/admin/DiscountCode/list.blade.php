@extends('admin.layouts.app')

@section('title')
<title>Discount Code - E-commerce</title>
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
        <h1>Discount Code List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right">
            <a href="{{route('add_discount_code')}}" class="btn btn-primary">Add New Discount Code</a>
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
                <h3 class="card-title">Discount Code List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Precent / Amount</th>
                        <th>Expire Date</th>
                        <th>Craeted Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($DiscountCode as $code)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $code->name }}</td>
                                <td>{{ $code->type }}</td>
                                <td>{{ $code->percent_amount }}</td>
                                <td>{{ date('d-m-Y',strtotime($code->expire_date)) }}</td>
                                <td>{{ date('d-m-Y',strtotime($code->created_at)) }}</td>
                                <td>{{ $code->status == 0 ? 'Active' : 'In Active' }}</td>
                                <td>
                                    <a href="{{route('edit_discount_code',$code->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('delete_discount_code',$code->id)}}" class="btn btn-danger">Delete</a>
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
