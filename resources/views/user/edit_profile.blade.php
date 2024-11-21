
@extends('layouts.app')
@section('title')
<title>User Edit Profile | E-Commerce</title>
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
            <h1 class="page-title">Edit Profile</h1>
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
                            <form action="{{route('update_profile')}}" method="POST">
                                @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" name="first_name" class="form-control" required value="{{$user->name}}">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" name="last_name" class="form-control" required value="{{$user->last_name}}">
                                        </div>
                                    </div>

                                    <label>Email address *</label>
                                    <input type="email" name="email" class="form-control" required value="{{$user->email}}">

                                    <label>Company Name (Optional)</label>
                                    <input type="text" name="company_name" class="form-control" value="{{$user->company_name}}">

                                    <label>Country *</label>
                                    <input type="text" name="country" class="form-control" required value="{{$user->country}}">

                                    <label>Street address *</label>
                                    <input type="text" name="address_one" class="form-control"  required value="{{$user->address_one}}">
                                    <input type="text" name="address_two" class="form-control"  value="{{$user->address_two}}">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>City *</label>
                                            <input type="text" name="city" class="form-control" required value="{{$user->city}}">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>State  *</label>
                                            <input type="text" name="state" class="form-control" required value="{{$user->state}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Postcode / ZIP *</label>
                                            <input type="text" name="postcode" class="form-control" required value="{{$user->postcode}}">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Phone *</label>
                                            <input type="tel" name="phone" class="form-control" required value="{{$user->phone}}">
                                        </div>
                                    </div>

                                    <button type="submit" style="width: 100px;" class="btn btn-outline-primary-2 btn-order btn-block">
                                        Submit
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
