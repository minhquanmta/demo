<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>

    <script type="text/javascript" src="{!! asset('public/js/jquery-3.1.1.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/js/jquery-ui.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/js/bootstrap.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/js/jquery.scrollUp.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/js/price-range.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/js/jquery.prettyPhoto.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/js/main.js') !!}"></script>

    <link href="{!! asset('public/css/jquery-ui.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/css/prettyPhoto.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/css/price-range.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/css/main.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/css/responsive.css') !!}" rel="stylesheet">
    <link rel="shortcut icon" href="{!! asset('public/images/ico/favicon.ico') !!}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{!! asset('public/images/ico/apple-touch-icon-144-precomposed.png') !!}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{!! asset('public/images/ico/apple-touch-icon-114-precomposed.png') !!}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{!! asset('public/images/ico/apple-touch-icon-72-precomposed.png') !!}">
    <link rel="apple-touch-icon-precomposed"
          href="{!! asset('public/images/ico/apple-touch-icon-57-precomposed.png') !!}">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{!! url('index') !!}"><img src="{!! asset('public/images/home/logo.png') !!}" alt=""/></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="col-sm-3">
                    </div>
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li>
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search" id="key_search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i
                                                    class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li><a href="{!! url('contact') !!}"><i class="fa fa-star"></i> Contact Us</a></li>
                                @if(count(Cart::content()) > 0)
                                    <li><a href="{!! url('cart')!!}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                @endif
                            <li><a href="{!! url('cart') !!}">
                                    <span>Giỏ hàng</span>
                                    <i class="fa fa-shopping-cart"></i>
                                </a></li>
                            <li><a href="{!! url('login') !!}"><i class="fa fa-lock"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

</header><!--/header-->

@yield('slider')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    @yield('categories')
                    <div class="shipping text-center"><!--shipping-->
                        <img src="{!! asset('public/images/home/shipping.jpg') !!}" alt=""/>
                    </div><!--/shipping-->
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                @yield('products')
                @yield('recommends')
            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{!! asset('public/images/home/iframe1.png') !!}"/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{!! asset('public/images/home/iframe2.png') !!}" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{!! asset('public/images/home/iframe3.png') !!}" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{!! asset('public/images/home/iframe4.png') !!}" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="{!! asset('public/images/home/map.png') !!}" alt=""/>
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank"
                                                           href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->

<script type="text/javascript" language="JavaScript">
    $('#key_search').keyup(function () {
        var arr = [];
        if ($('#key_search').val() != "") {
            $.ajax({
                url: "{!!url('key-search')!!}" + "/" + $(this).val(),
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (index, value) {
                        arr[index] = value["name"];
                    });
                    $('#key_search').autocomplete({
                        source: arr
                    });
                },
                error: function () {
                }
            });
        }
    });

</script>

</body>
</html>