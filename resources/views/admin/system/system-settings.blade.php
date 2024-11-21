@extends('admin.layouts.app')

@section('title')
<title>System Settings - E-commerce</title>
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
        <h1>System Settings</h1>
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
                    @include('admin.layouts.messages')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('update_system_settings')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Website Name </label>
                            <input type="text" class="form-control"  name="website_name" value="{{$website->website_name}}">
                        </div>
                        <div class="form-group">
                            <label>Logo </label>
                            <input type="file" class="form-control"  name="logo" value="{{$website->logo}}">
                            @if(!empty($website->getLogo()))
                                <img src="{{$website->getLogo()}}" width="100" height="100">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Fevicon </label>
                            <input type="file" class="form-control"  name="fevicon" value="{{$website->fevicon}}">
                            @if(!empty($website->getFevicon()))
                                <img src="{{$website->getFevicon()}}" width="50" height="50">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Footer Description </label>
                            <textarea class="form-control"  name="footer_description" >{{$website->footer_description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Footer Payment Icon </label>
                            <input type="file" class="form-control"  name="footer_payment_icon" value="{{$website->footer_payment_icon}}">
                            @if(!empty($website->getFooterPaymentIcon()))
                                <img src="{{$website->getFooterPaymentIcon()}}" width="50" height="50">
                            @endif
                        </div>

                        <hr>

                        <div class="form-group">
                            <label>Address </label>
                            <textarea class="form-control"  name="address" >{{$website->address}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Phone </label>
                            <input type="number" min="0" class="form-control"  name="phone" value="{{$website->phone}}">
                        </div>

                        <div class="form-group">
                            <label>Phone 2 </label>
                            <input type="number" min="0" class="form-control"  name="phone_two" value="{{$website->phone_two}}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" min="0" class="form-control"  name="email" value="{{$website->email}}">
                        </div>

                        <hr>

                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" min="0" class="form-control"  name="facebook" value="{{$website->facebook}}">
                        </div>

                        <div class="form-group">
                            <label>Twitter</label>
                            <input type="text" min="0" class="form-control"  name="twitter" value="{{$website->twitter}}">
                        </div>

                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="text" min="0" class="form-control"  name="instagram" value="{{$website->instagram}}">
                        </div>

                        <div class="form-group">
                            <label>Youtube</label>
                            <input type="text" min="0" class="form-control"  name="youtube" value="{{$website->youtube}}">
                        </div>

                        <div class="form-group">
                            <label>Pinterest</label>
                            <input type="text" min="0" class="form-control"  name="pinterest" value="{{$website->pinterest}}">
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
