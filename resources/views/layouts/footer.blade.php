<footer class="footer footer-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="widget widget-about">
                        <img src="{{$getSystemSettingApp->getLogo()}}" class="footer-logo" alt="Footer Logo" width="105" height="25">
                        <p>
                            @if(!empty($getSystemSettingApp->footer_description))
                            {{ $getSystemSettingApp->footer_description }}
                            @endif
                        </p>

                        <div class="social-icons">
                            @if(!empty($getSystemSettingApp->facebook))
                                <a href="{{$getSystemSettingApp->facebook}}" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            @endif
                            @if(!empty($getSystemSettingApp->twitter))
                                <a href="{{$getSystemSettingApp->twitter}}" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            @endif
                            @if(!empty($getSystemSettingApp->instagram))
                                <a href="{{$getSystemSettingApp->instagram}}" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            @endif
                            @if(!empty($getSystemSettingApp->youtube))
                                <a href="{{$getSystemSettingApp->youtube}}" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                            @endif
                            @if(!empty($getSystemSettingApp->pinterest))
                                <a href="{{$getSystemSettingApp->pinterest}}" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                            @endif

                        </div><!-- End .soial-icons -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-4">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{url('')}}">Home</a></li>
                            <li><a href="{{url('about')}}">About Us</a></li>
                            <li><a href="{{url('fag')}}">FAQ</a></li>
                            <li><a href="{{url('contact')}}">Contact us</a></li>
                            <li><a href="{{url('blog')}}">Blog</a></li>
                            <li><a href="#signin-modal" data-toggle="modal">Log in</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © {{date('Y')}} {{$getSystemSettingApp->website_name}}. All Rights Reserved.</p><!-- End .footer-copyright -->
            <figure class="footer-payments">
                <img src="{{$getSystemSettingApp->getFooterPaymentIcon()}}" alt="Payment methods" width="272" height="20">
            </figure><!-- End .footer-payments -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->
