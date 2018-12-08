<!DOCTYPE html>
<html>
<head>
    <title>RD-SHOPS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('frontend/css/slider1.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

    <script type="text/javascript" src="{{ asset('frontend/js/css_browser_selector.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.carouFredSel-6.2.1-packed.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.easing-1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.flexslider-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.lazyload.min.js') }}"></script>
</head>
<header>
    <div class="container">
        <section class="style-one-header top-area">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="login-menu-holder ic-sm-user">
                            Welcome,
                            <a href="">Logout</a>
                            <a href="">Login or Register</a>
                    </div>
                    <div class="hotline-holder ic-sm-phone">
                        <label>hotline:</label>
                        <span>1-800-123-4567</span>
                    </div>
                </div>
                <div class="top-logo-holder col-sm-4 col-xs-12">

                    <div class="top-logo">
                      <a href=""><img src="" alt="" class="logo"></a>
                    </div>

                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="wish-cart-holder">
                        <div class="top-cart-holder ic-sm-basket" id="mini-cart">

                        <!--Minimarket-->
                        <a href="">shopping cart</a>:
                        <span class="top-cart-price"></span>
                        <div class="total-buble">
                            <span>0</span>
                        </div>

                        <div class="hover-holder">

                            <ul class="basket-items ">
                                <li class="row">
                                    <div class="thumb col-xs-3">
                                        <img width="45" height="45" alt="" src="">
                                    </div>
                                    <div class="body col-xs-9">
                                        <h5>Product Name</h5>
                                        <div class="price">
                                            <span></span>
                                        </div>
                                        <a class="remove-item" href="#"
                                            data-ajax-handler="shop:cart" 
                                            data-ajax-update="#cart-content=shop-cart-content, #mini-cart=shop-minicart"
                                            data-ajax-extra-fields="delete_item=''">x</a>
                                    </div>
                                </li>
                            </ul>
                            
                            <a class="top-chk-out md-button" href="">check out</a>
                        </div>
                            
                        </div>
                        <div class="search-holder">
                            <form action="" method="get">
                                <input type="text" name="query" id="query" placeholder="Search" autocomplete="off" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        

    </div>
</header>
</html>