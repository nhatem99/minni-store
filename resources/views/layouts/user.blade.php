<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('public/users/reset.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/users/css/carousel/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/users/css/carousel/owl.theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/users/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('public/users/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/users/css/lightgallery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/users/css/lightslider.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')
    <link href="{{ asset('public/users/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('public/users/images/icon-4men.ico') }}">
</head>

<body>
    <div id="site">
        <div id="container">
            @include('user.components.header')
            <div id="main-content-wp" class="@yield('main_class') clearfix">
                <div class="wp-inner">
                    @yield('content')
                </div>
            </div>
            @include('user.components.footer')
        </div>
        @include('user.components.menuRespon')
        <div id="btn-top"><img src="{{ asset('public/users/images/icon-to-top.png') }}" alt="" /></div>
        <div id="fb-root"></div>
    </div>
    <script src="{{ asset('public/bootstrap/js/jquery-3.5.1.min.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('public/users/js/elevatezoom-master/jquery.elevatezoom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/users/js/carousel/owl.carousel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/users/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/users/js/lightgallery-all.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/users/js/lightslider.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/users/js/home.js') }}"></script>
    @yield('js')
    <script>
        $(document).ready(function() {
            var slider = $('#imageGallery').lightSlider({
                gallery: true,
                item: 1,
                loop: true,
                thumbItem: 6,
                slideMargin: 0,
                enableDrag: false,
                currentPagerPosition: 'left',
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }
            });
            $('.desc .product-color').click(function() {
                var id = $(this).data('id')
                slider.goToSlide(id);
            });
        });
    </script>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

</html>
