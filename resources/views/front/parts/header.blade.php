<!-- Main Header Start -->
<header class="irs-main-header">
    <div class="irs-header-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-4">
                    <div class="irs-header-top-col irs-center-2">
                        <p><i class="fa fa-phone" aria-hidden="true"></i> {{ $siteInfo['contact_office'] }}</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="irs-header-top-col irs-center-2">
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $siteInfo['contact_we_work'] }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-5 col-sm-4">
                    <div class="irs-header-top-col text-right irs-center-2">
                        <div class="irs-social text-right irs-center-2">
                            @if($siteInfo['contact_facebook'])
                                <a href="{{ $siteInfo['contact_facebook'] }}"><i class="icofont icofont-social-facebook"></i></a>
                            @endif
                            @if($siteInfo['contact_twitter'])
                                <a href="{{ $siteInfo['contact_twitter'] }}"><i class="icofont icofont-social-twitter"></i></a>
                            @endif
                            @if($siteInfo['contact_youtube'])
                                <a href="{{ $siteInfo['contact_youtube'] }}"><i class="icofont icofont-social-youtube"></i></a>
                            @endif
                            @if($siteInfo['contact_linkedin'])
                                <a href="{{ $siteInfo['contact_linkedin'] }}"><i class="icofont icofont-brand-linkedin"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="irs-header-nav scrollingto-fixed">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-12">
                    <nav class="navbar navbar-default irs-navbar">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    <img src="images/logo.png" alt="">
                                </a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right" data-hover="dropdown" data-animations="flipInY">
                                    <li class="active">
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li><a href="{{ url('about') }}">About</a></li>
                                    <li><a href="{{ url('teacher') }}">Teachers</a></li>
                                    <li><a href="{{ url('news') }}">News</a></li>
                                    <li><a href="{{ url('gallery') }}">Gallery</a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                </div>
                <div class="col-md-2 col-sm-12">
                    <div class="irs-log-reg">
                        <a href="{{ url('contact-us') }}">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    <!-- Main Header end -->