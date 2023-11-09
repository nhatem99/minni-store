<div id="header-wp">
    {{-- @if ($session->status)
        <p>{{ $session->status }}</p>
    @endif --}}
    <div id="head-body" class="clearfix">
        <div class="wp-inner d-none d-lg-block">
            <div class="topbar-top">
                <div class="topbar-top__left">
                    <div id="logo">
                        <a href="{{ route('user.index') }}" title="" class=""><img
                                src="{{ asset('public/users/images/logo-5.png') }}" /></a>
                    </div>

                    <div id="search-wp" class="">
                        <form action="{{ route('user.search') }}" autocomplete="off">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    aria-describedby="basic-addon2" id="search"
                                    value="{{ request()->input('search') }}"
                                    placeholder="Nhập từ khóa tìm kiếm tại đây!"
                                    data-url="{{ route('user.autocomplete') }}">
                                <button type="submit" id="sm-search"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                                {{-- <input type="submit"  value="Tìm kiếm" /> --}}
                            </div>


                        </form>
                        <div id="results-search"></div>


                    </div>
                </div>
                <div class="topbar-top__right">
                    {{-- List contact --}}
                    <div class="list-contact d-flex">
                        <a href="" class="phone">
                            <b>1800 2086</b>
                        </a>
                        <span class="text-free">Free</span>
                        <span style="margin: 0 8px;">-</span>
                        <span style="margin: 0 8px; color: #11006F; font-weight: 600; font-size: 16px;">Đặt hàng
                            gọi</span>
                        <a href="tel:02499986999" class="phone">02499986999 </a>
                    </div>
                    {{-- acction --}}
                    {{-- <div id="action-wp" class="">
                        <div id="advisory-wp" class="fl-left">
                            <span class="title">Tư vấn</span>
                            <span class="phone">0377.411.577</span>
                        </div>

                        <a href="{{ route('cart.show') }}" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span id="num" class="num-total">{{ Cart::count() }}</span>
                        </a>
                        <div id="cart-wp" class="fl-right">
                            <div id="btn-cart">
                                <a href="{{ route('cart.show') }}" title="Giỏ hàng">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <span id="num" class="num-total">{{ Cart::count() }}</span>
                            </div>
                            <div id="dropdown-cart-wp">
                                @if (Cart::count() > 0)
                                    <div id="dropdown">
                                        <p class="desc">Có <span class="num-total">{{ Cart::count() }}</span> sản phẩm
                                            trong
                                            giỏ hàng</p>
                                        <ul class="list-cart">
                                            @foreach (Cart::content() as $item)
                                                <li class="clearfix">
                                                    <a href="{{ route('product.detail', ['slugCategory' => $item->options->slug_category, 'slugProduct' => $item->options->slug_product]) }}"
                                                        title="" class="thumb fl-left">
                                                        <img src="{{ asset($item->options->image_product) }}"
                                                            alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="{{ route('product.detail', ['slugCategory' => $item->options->slug_category, 'slugProduct' => $item->options->slug_product]) }}"
                                                            title="" class="product-name">{{ $item->name }}</a>
                                                        <p class="price">
                                                            {{ number_format($item->price * $item->qty, 0, ',', '.') }}đ
                                                        </p>
                                                        <div class="color_qty d-flex">
                                                            <p class="color_name mr-3">Màu: <span
                                                                    class="font-weight-bold">{{ $item->options->color_name }}</span>
                                                            </p>
                                                            <p class="qty">Số lượng: <span
                                                                    class="font-weight-bold">{{ $item->qty }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right text-danger total-cart">
                                                {{ number_format(Cart::total(), 0, ',', '.') }}đ</p>
                                        </div>
                                        <div class="action-cart clearfix">
                                            <a href="{{ route('cart.show') }}" title="Giỏ hàng"
                                                class="view-cart fl-left">Giỏ
                                                hàng</a>
                                            <a href="{{ route('user.checkout') }}" title="Thanh toán"
                                                class="checkout fl-right">Thanh toán</a>
                                        </div>
                                    </div>
                                @else
                                    <div id="cart-empty">
                                        <p class="desc">Không có sản phẩm trong giỏ hàng</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>


        </div>
        <div class="container container-mb d-flex d-lg-none">
            <div class="sibar" style="flex: 1; padding-left:10px">
                <img style="width: 28px; height: 28px" src="{{ asset('public/users/images/menu.webp') }}">
            </div>
            <div class="logo" style="flex: 1; padding-left: 20px;">
                <a href="{{ route('user.index') }}">
                    <img src="{{ asset('public/users/images/logo-5.png') }}">
                </a>
            </div>
            <div class="header-tool d-lg-none d-flex align-items-center">
                <div id="search_header" style="padding: 7px 2px;">
                    <img width="35" height="35" src="{{ asset('public/users/images/search_icon.webp') }}"
                        alt="message">
                </div>
                <div class="cart-drop">
                    <div id="btn-cart">
                        <a href="{{ route('cart.show') }}" title="Giỏ hàng">
                            <img width="24" height="24" src="{{ asset('public/users/images/cart.svg') }}"
                                alt="giỏ hàng">
                        </a>
                        <span id="num" class="num-total">{{ Cart::count() }}</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="menu_sidebar_mobile d-lg-none">
            <div class="sidebar_title">
                <button class="close_sidebar">
                    <img src="{{ asset('public/users/images/closemenu.svg') }}" alt="vecter_x">
                </button>
            </div>
            <div class="sidebar_content">
                <h6 class="item_trangchu"><a href="/yodyyeu" style="font-size: 20px; font-weight: bold;"><span
                            style="color: #2A2A86">YO</span><span style="color: #FCAF17">DY</span> <span
                            style="color: #FCAF17; font-style: italic;">Yêu</span></a></h6>
                <div class="sidbar_item">
                    <div class="item_child">
                        <h6>
                            NAM
                        </h6>
                        <button>
                            <img class="sub_icon" src="{{ asset('public/users/images/plus.webp') }}"
                                data-minus="{{ asset('public/users/images/minus.webp') }}"
                                data-plus="{{ asset('public/users/images/plus.webp') }}" alt="plus">
                        </button>
                    </div>
                    <div class="menu_item_child d-none">
                        <div class="menuTask">
                            @foreach ($categoryProductParentMale as $item)
                                <div class="second_child">
                                    <div class="second_child_item submenu">
                                        <h6>
                                            {{ $item->name }}</h6>
                                        <button class="open_menu_second">
                                            <img class="sub_icon_second"
                                                src="{{ asset('public/users/images/plus.webp') }}"
                                                data-minus="{{ asset('public/users/images/minus.webp') }}"
                                                data-plus="{{ asset('public/users/images/plus.webp') }}"
                                                alt="plus">
                                        </button>
                                    </div>
                                    <div class="menu_second_child d-none">
                                        @if ($item->catProductChild->count() > 0)
                                            @foreach ($item->catProductChild as $productChild)
                                                <a href="{{ route('user.category', $productChild->slug) }}"
                                                    class="third_child resert_menu">
                                                    {{ $productChild->name }}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="sidbar_item">
                    <div class="item_child">
                        <h6>
                            NỮ
                        </h6>
                        <button>
                            <img class="sub_icon" src="{{ asset('public/users/images/plus.webp') }}"
                                data-minus="{{ asset('public/users/images/minus.webp') }}"
                                data-plus="{{ asset('public/users/images/plus.webp') }}" alt="plus">
                        </button>
                    </div>
                    <div class="menu_item_child d-none">
                        <div class="menuTask">
                            @foreach ($categoryProductParentFeMale as $item)
                                <div class="second_child">
                                    <div class="second_child_item submenu">
                                        <h6>
                                            {{ $item->name }}
                                        </h6>
                                        <button class="open_menu_second">
                                            <img class="sub_icon_second"
                                                src="{{ asset('public/users/images/plus.webp') }}"
                                                data-minus="{{ asset('public/users/images/minus.webp') }}"
                                                data-plus="{{ asset('public/users/images/plus.webp') }}"
                                                alt="plus">
                                        </button>
                                    </div>
                                    <div class="menu_second_child d-none">
                                        @if ($item->catProductChild->count() > 0)
                                            @foreach ($item->catProductChild as $productChild)
                                                <a href="{{ route('user.category', $productChild->slug) }}"
                                                    class="third_child resert_menu">
                                                    {{ $productChild->name }}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="sidbar_item">
                    <div class="item_child">
                        <h6>
                            <a href="{{ route('user.blog') }}" title="">BLOG</a>
                        </h6>
                    </div>
                </div>
                @foreach ($pages as $item)
                    <div class="sidbar_item">
                        <div class="item_child">
                            <h6>
                                <a href="{{ route('user.page', ['id' => $item->id]) }}"
                                    title="{{ $item->title }}">{{ $item->title }}</a>
                            </h6>
                        </div>
                    </div>
                @endforeach
                <div class="sidbar_contact">
                    <div class="item_contact item_not_level">
                        <img class="sub_icon" src="{{ asset('public/users/images/messages.svg') }}" alt="message">
                        <a href="https://zalo.me/0377411577">Tư vấn qua Zalo</a>
                    </div>

                    @if (Auth::guard('account')->check())
                        <div class="item_contact item_not_level">
                            <img class="sub_icon" src="{{ asset('public/users/images/vector_userui.svg') }}"
                                alt="user">
                            <a href="{{ route('user.account') }}">Tài khoản của tôi</a>
                        </div>
                        <div class="item_contact item_not_level click_theo_doi">
                            <img class="sub_icon" src="{{ asset('public/users/images/car.svg') }}" alt="delivery">
                            <a href="{{ route('account-order') }}">Đơn hàng của tôi</a>
                        </div>
                    @else
                        <div class="item_contact item_not_level">
                            <img class="sub_icon" src="{{ asset('public/users/images/vector_userui.svg') }}"
                                alt="user">
                            <a href="{{ route('user.login') }}">Đăng nhập</a>
                        </div>
                    @endif



                </div>
            </div>
        </div>
        <div class="search_sidebar d-lg-none" style="transform: translateX(100%);">
            <div class="title">
                <button class="close_search">
                    <img width="24" height="24"
                        src="{{ asset('public/users/images/arrow-left-search.svg') }}" alt="message">
                </button>
                <h5>
                    Tìm kiếm sản phẩm
                </h5>
            </div>
            <div class="theme-search-smart d-lg-none ">
                <div class="header_search theme-searchs">
                    <form action="{{ route('user.search') }}" autocomplete="off" class="input-group">
                        <input type="text" id="search_input" aria-label="Tìm sản phẩm" name="search"
                            value="{{ request()->input('search') }}" autocomplete="off"
                            placeholder="Cần tìm áo thun, polo, đồ thể thao,…" class="search-auto auto-search"
                            data-url="{{ route('user.autocomplete') }}">
                        <button type="submit" id="btn_search" class="btn icon-fallback-text input-group-btn "
                            style="background-color: rgb(217, 217, 217);"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                    </form>
                    <button class="delete_search d-none">
                        <img width="17.5px" height="17.5px"
                            src="{{ asset('public/users/images/close-search.svg') }}" alt="message">
                    </button>
                    <div class="results-box box_banner d-none">
                        <div class="goi_y"></div>
                        <div class="search-results"></div>
                        <div class="history"></div>
                    </div>
                </div>
            </div>
            <div class="result-search-sidebar">
                <div class="tin_noi_bat">
                    <h6>
                        Tìm kiếm nổi bật
                    </h6>
                    <ul>
                        <li>
                            <a href="{{ route('user.category', 'ao-thun-nam') }}" class="key_item resertSearch">Áo
                                thun</a>
                        </li>
                        <li>
                            <a href="{{ route('user.category', 'ao-polo-nu') }}" class="key_item resertSearch">Áo
                                polo</a>
                        </li>
                        <li>
                            <a href="{{ route('user.category', 'ao-polo-the-thao-nu') }}"
                                class="key_item resertSearch">Đồ thể thao</a>
                        </li>
                        <li>
                            <a href="{{ route('user.category', 'quan-jeans-nu') }}"
                                class="key_item resertSearch">Quần jean</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wp-inner">
        <div class="topbar-bottom">
            <div class="topbar-bottom__left">
                <nav class="header-nav d-none d-lg-flex">
                    <ul class="item_big">
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" title="">Trang chủ</a>
                        </li>

                        <li class="nav-item has-mega">
                            <a href="{{ route('user.category', 'ao-nam') }}" title="">NAM</a>
                            <ul class="mega_type_2_group mega_menu">
                                <li class="parrent-mega">
                                    <ul>
                                        @foreach ($categoryProductParentMale as $item)
                                            <li class="li-item-1">
                                                <a href="{{ route('user.category', $item->slug) }}"
                                                    class="title-m caret-down"
                                                    title="{{ $item->name }}">{{ $item->name }}</a>
                                                <ul>
                                                    <li>
                                                        @if ($item->catProductChild->count() > 0)
                                                            @include(
                                                                'user.components.categoryProductChild',
                                                                ['categoryProductChild' => $item->catProductChild]
                                                            )
                                                        @endif
                                                    </li>
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="banner banner_2"><a href=""><img class="lazyload loaded"
                                            src="{{ asset('public/uploads/product/img2/12\ao-polo-cafe-apm3635-gre-11-yodyvn.webp') }}"
                                            data-src="{{ asset('public/uploads/product/img2/12\ao-polo-cafe-apm3635-gre-11-yodyvn.webp') }}"
                                            alt="NAM" data-was-processed="true"></a></li>
                            </ul>
                        </li>
                        <li class="nav-item has-mega">
                            <a href="{{ route('user.category', 'ao-nu') }}" title="">Nữ</a>
                            <ul class="mega_type_2_group mega_menu">
                                <li class="parrent-mega">
                                    <ul>
                                        @foreach ($categoryProductParentFeMale as $item)
                                            <li class="li-item-1">
                                                <a href="{{ route('user.category', $item->slug) }}"
                                                    class="title-m caret-down"
                                                    title="{{ $item->name }}">{{ $item->name }}</a>
                                                <ul>
                                                    <li>
                                                        @if ($item->catProductChild->count() > 0)
                                                            @include(
                                                                'user.components.categoryProductChild',
                                                                ['categoryProductChild' => $item->catProductChild]
                                                            )
                                                        @endif
                                                    </li>
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="banner banner_2"><a href=""><img class="lazyload loaded"
                                            src="{{ asset('public/uploads/product/12\ao-polo-the-thao-nu-san6026-nav-6.webp') }}"
                                            data-src="{{ asset('public/uploads/product/12\ao-polo-the-thao-nu-san6026-nav-6.webp') }}"
                                            alt="NAM" data-was-processed="true"></a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.blog') }}" title="">Blog</a>
                        </li>

                        @foreach ($pages as $item)
                            <li class="nav-item">
                                <a href="{{ route('user.page', ['id' => $item->id]) }}"
                                    title="{{ $item->title }}">{{ $item->title }}</a>
                            </li>
                        @endforeach

                    </ul>
                </nav>
            </div>
            <div class="topbar-bottom__right">
                <div class="cart-drop d-none d-lg-flex">
                    <a class="cart-wrap" href="{{ route('cart.show') }}" title="Giỏ hàng">
                        <img width="28" height="28"
                            src="{{ asset('public/users/images/icon-cart-header.svg') }}" alt="giỏ hàng">
                        <span class="count_item count_item_pr hidden-count">{{ Cart::count() }}</span>
                        <span class="gio-hang">GIỎ HÀNG</span>
                    </a>
                    <div class="top-cart-content">
                        <img style="position: absolute; top: -10px; left: 310px;"
                            src="//bizweb.dktcdn.net/100/438/408/themes/919724/assets/arrow-cart-white.png?1698751457194">
                        <div class="CartHeaderContainer">
                            @if (Cart::count() > 0)
                                <ul class="list-cart">
                                    @foreach (Cart::content() as $item)
                                        <li class="clearfix">
                                            <a href="{{ route('product.detail', ['slugCategory' => $item->options->slug_category, 'slugProduct' => $item->options->slug_product]) }}"
                                                title="" class="thumb ">
                                                <img src="{{ asset($item->options->image_product) }}" alt="">
                                            </a>
                                            <div class="info">
                                                <a href="{{ route('product.detail', ['slugCategory' => $item->options->slug_category, 'slugProduct' => $item->options->slug_product]) }}"
                                                    title="" class="product-name">{{ $item->name }}</a>
                                                <p class="price">
                                                    {{ number_format($item->price * $item->qty, 0, ',', '.') }}đ
                                                </p>
                                                <span class="color_qty ">
                                                    <span class="color_name mr-3">Màu: <span
                                                            class="font-weight-bold">{{ $item->options->color_name }}</span>
                                                    </span>
                                                    <span class="qty">Số lượng: <span
                                                            class="font-weight-bold">{{ $item->qty }}</span>
                                                    </span>
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="total-price clearfix">
                                    <p class="title fl-left">Tổng cộng:</p>
                                    <p class="price fl-right text-danger total-cart">
                                        {{ number_format(Cart::total(), 0, ',', '.') }}đ</p>
                                </div>
                                <div class="action-cart clearfix">
                                    <a href="{{ route('cart.show') }}" title="Giỏ hàng"
                                        class="view-cart fl-left">Giỏ
                                        hàng</a>
                                    <a href="{{ route('user.checkout') }}" title="Thanh toán"
                                        class="checkout fl-right">Thanh toán</a>
                                </div>
                            @else
                                <div class="cart--empty-message">
                                    <img src="//bizweb.dktcdn.net/100/438/408/themes/919724/assets/blank_cart.svg?1698813703985"
                                        alt="cart">
                                    <p>Giỏ hàng của bạn trống</p>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
                <div class="header-tool d-none d-lg-flex">
                    <div class="user">
                        <div class="user-login">
                            @if (!Auth::guard('account')->check())
                                <a href="{{ route('user.register') }}" class="pr-1">Đăng ký</a>
                            @endif

                            @if (Auth::guard('account')->check())
                                <a href="">
                                    Cá Nhân
                                </a>
                                <div class="account_header">
                                    <ul style="margin-top: 10px;">
                                        <li>
                                            <a style="border-bottom: 1px #dde1ef solid;color:#fcaf17";><b>
                                                    {{ Auth::guard('account')->user()->name }}</b>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('cart.user', Auth::guard('account')->user()->id) }}">Thông
                                                tin đơn hàng</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.account') }}">Tài khoản của tôi</a>
                                        </li>

                                        <li class="logout">
                                            <a href="{{ route('user.logout') }}"
                                                style="border-top: 1px #dde1ef solid;" class="d-flex"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out mr-1" aria-hidden="true"
                                                    style="font-size:23px"></i> Đăng xuất</a>
                                            <form id="logout-form" action="{{ route('user.logout') }}"
                                                method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('user.login') }}" class="pl-1" title="">Đăng Nhập</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
