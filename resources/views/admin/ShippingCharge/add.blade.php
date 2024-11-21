@extends('admin.layouts.app')

@section('title')
<title>Add Shipping Charge - E-commerce</title>
@endsection

@section('style')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
        <h1>Add New Shipping Charge</h1>
        </div>
    </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    {{-- @include('admin.layouts.messages') --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('insert_shipping_charge')}}" method="post">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Shipping Charge Name <span style="color:red">*</span></label>
                            <input type="text" class="form-control" required name="name" placeholder="Shipping Charge Name">
                        </div>

                        <div class="form-group">
                            <label>Shipping Charge Price <span style="color:red">*</span></label>
                            <input type="text" class="form-control" required name="price" placeholder="Shipping Charge Price">
                        </div>

                        <div class="form-group">
                            <label>Status <span style="color:red">*</span></label>
                            <select class="form-control" name="status" required>
                                <option value="0">Active</option>
                                <option value="1">In Active</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </div>
                    </form>
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
