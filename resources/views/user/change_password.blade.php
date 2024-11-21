
@extends('layouts.app')
@section('title')
<title>User Change Password | E-Commerce</title>
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
            <h1 class="page-title">Change Password </h1>
        </div>
    </div>


    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                @include('admin.layouts.messages')

                <br>
                <div class="row">
                    @include('user.side_bar')
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <form action="{{route('update_password')}}" method="POST">
                                @csrf
                                    <label>Old Password *</label>
                                    <input type="password" name="olde_password" class="form-control" required>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>New Password *</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label> Confirm Password *</label>
                                            <input type="password" name="cpassword" class="form-control" required >
                                        </div>
                                    </div>
                                    <button type="submit" style="width: 200px;" class="btn btn-outline-primary-2 btn-order btn-block">
                                        Update Password
                                    </button>
                            </form>
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
