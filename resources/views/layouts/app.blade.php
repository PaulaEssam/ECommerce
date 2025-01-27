<!DOCTYPE html>
<html lang="en">


<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if(!empty($subCategory->meta_title))
        <title>{{ $category->meta_title }}  {{$subCategory->meta_title}}</title>
    @elseif (!empty($category->meta_title))
        <title>{{ $category->meta_title }}</title>
    @else
        @yield('title')
    @endif

    @if (!empty($category->meta_desc))
        <meta name="description" content="{{$category->meta_desc}}">
    @endif

    @if (!empty($category->meta_key))
        <meta name="keywords" content="{{$category->meta_key}}">
    @endif

    @php
        $getSystemSettingApp = App\Models\SystemSettings::find(1);
    @endphp

    <link rel="shortcut icon" href="{{$getSystemSettingApp->getFevicon()}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{url('public/assets-home/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('public/assets-home/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('public/assets-home/css/plugins/magnific-popup/magnific-popup.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{url('public/assets-home/css/style.css')}}">
    @yield('style')
    <style>
        .btn-wishlist-add::before{
            content: '\f233' !important;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')


    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    @include('layouts.mobile')


    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="" id="SubmitFormLogin" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="singin-email">Email address <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="singin-email" name="email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password <span style="color: red">*</span></label>
                                            <input type="password" class="form-control" id="singin-password" name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember" name="is_remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            {{-- <a href="#" class="forgot-link">Forgot Your Password?</a> --}}
                                        </div>
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="" id="SubmitFormRegister" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="register-namr">Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="register-name" name="name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="register-email">Email address <span style="color: red">*</span></label>
                                            <input type="email" class="form-control" id="register-email" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="register-password">Password <span style="color: red">*</span></label>
                                            <input type="password" class="form-control" id="register-password" name="password" required>
                                        </div>

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                            </div><!-- End .custom-checkbox -->
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Plugins JS File -->
    <script src="{{url('public/assets-home/js/jquery.min.js')}}"></script>
    <script src="{{url('public/assets-home/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('public/assets-home/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{url('public/assets-home/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{url('public/assets-home/js/superfish.min.js')}}"></script>
    <script src="{{url('public/assets-home/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('public/assets-home/js/jquery.magnific-popup.min.js')}}"></script>
    @yield('script')
    <!-- Main JS File -->
    <script src="{{url('public/assets-home/js/main.js')}}"></script>
    <script>
        $('body').delegate('#SubmitFormLogin', 'submit', function(e){
            e.preventDefault();
                $.ajax({
                type: 'POST',
                url: "{{url('auth_login')}}",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data){
                    if(data.status == true){
                        // alert(data.message);
                        location.reload();
                    }
                    else{
                        alert(data.message);
                    }
                },
                error: function(data){

                },
            });
        });

        $('body').delegate('#SubmitFormRegister', 'submit', function(e){
            e.preventDefault();
                $.ajax({
                type: 'POST',
                url: "{{url('auth_register')}}",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data){
                    if(data.status == true){
                        alert(data.message);
                        location.reload();
                    }
                    else{
                        alert(data.message);
                    }
                },
                error: function(data){

                },
            });
        });

        $('body').delegate('.add-to-wishlist', 'click', function(e){
            var productID = $(this).attr('id');
                $.ajax({
                type: 'POST',
                url: "{{route('add_to_wishlist')}}",
                data :{
                    "_token": "{{csrf_token()}}",
                    productID : productID,
                },
                dataType: 'json',
                success: function(data){
                    if(data.is_wishlist == 1){
                        $('.add-to-wishlist'+productID).addClass('btn-wishlist-add');
                    }
                    else{
                        $('.add-to-wishlist'+productID).removeClass('btn-wishlist-add');
                    }
                },

            });
        });
    </script>
</body>


</html>
