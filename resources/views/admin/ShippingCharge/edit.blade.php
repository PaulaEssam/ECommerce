@extends('admin.layouts.app')

@section('title')
<title>Edit Shipping Charge - E-commerce</title>
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
        <h1>Edit Shipping Charge</h1>
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

                    <form action="{{route('update_shipping_charge',$ShippingCharge->id)}}" method="post">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label>Shipping Charge Name </label>
                        <input type="text" class="form-control"  name="name" placeholder="Color Name" value="{{$ShippingCharge->name}}">
                        </div>

                        <div class="form-group">
                            <label>Shipping Charge Price </label>
                            <input type="text" class="form-control"  name="price" placeholder="Shipping Charge Price" value="{{$ShippingCharge->price}}">
                        </div>

                        <div class="form-group">
                        <label>Status </label>
                        <select class="form-control" name="status">
                            <option value="0" {{$ShippingCharge->status == 0 ? 'selected' : ''}}>Active</option>
                            <option value="1" {{$ShippingCharge->status == 1 ? 'selected' : ''}}>In Active</option>
                        </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
