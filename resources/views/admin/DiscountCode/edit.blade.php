@extends('admin.layouts.app')

@section('title')
<title>Edit Discount Code - E-commerce</title>
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
        <h1>Edit Discount Code</h1>
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

                    <form action="{{route('updatediscount_code',$DiscountCode->id)}}" method="post">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label>Discount Code Name </label>
                        <input type="text" class="form-control"  name="name" placeholder="Color Name" value="{{$DiscountCode->name}}">
                        </div>

                        <div class="form-group">
                            <label>Amount <span style="color:red">*</span></label>
                            <select class="form-control" name="type" required>
                                <option value="Amount" {{$DiscountCode->type == 'Amount' ? 'selected' : ''}}>Amount</option>
                                <option value="Percent" {{$DiscountCode->type == 'Percent' ? 'selected' : ''}}>Percent</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Percent / Amount <span style="color:red">*</span></label>
                            <input type="text" class="form-control" required name="percent_amount" placeholder="Precent / Amount" value="{{$DiscountCode->percent_amount}}">
                        </div>

                        <div class="form-group">
                            <label>Expire Date <span style="color:red">*</span></label>
                            <input type="date" class="form-control" required name="expire_date" value="{{$DiscountCode->expire_date}}">
                        </div>

                        <div class="form-group">
                        <label>Status </label>
                        <select class="form-control" name="status">
                            <option value="0" {{$DiscountCode->status == 0 ? 'selected' : ''}}>Active</option>
                            <option value="1" {{$DiscountCode->status == 1 ? 'selected' : ''}}>In Active</option>
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
