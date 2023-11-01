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
                                src="{{ asset('public/users/images/Logo-2.png') }}" /></a>
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
            <div class="sibar" style="flex: 1">
                <img style="width: 28px; height: 28px"
                    src="//bizweb.dktcdn.net/100/438/408/themes/919724/assets/menu.jpg?1698661561550">
            </div>
            <div class="logo" style="flex: 1; padding-left: 20px;">
                <a href="/">
                    <img src="//bizweb.dktcdn.net/100/438/408/themes/919724/assets/logo.svg?1698661561550">
                </a>
            </div>
            <div class="header-tool d-lg-none d-flex align-items-center">
                <div id="search_header" style="padding: 7px 2px;">
                    <img width="35" height="35"
                        src="//bizweb.dktcdn.net/100/438/408/themes/919724/assets/search_icon.jpg?1698661675398"
                        alt="message">
                </div>
                <div class="cart-drop">
                    <div id="btn-cart">
                        <a href="{{ route('cart.show') }}" title="Giỏ hàng">
                            <img width="24" height="24"
                                src="//bizweb.dktcdn.net/100/438/408/themes/919724/assets/cart.svg?1698661675398"
                                alt="giỏ hàng">
                        </a>
                        <span id="num" class="num-total">{{ Cart::count() }}</span>
                    </div>

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
                            src="//bizweb.dktcdn.net/100/438/408/themes/919724/assets/icon-cart-header.svg?1698744645576"
                            alt="giỏ hàng">
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
                                <div id="cart-empty">
                                    <p class="desc">Không có sản phẩm trong giỏ hàng</p>
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
                                            <a href="{{ route('user.verify') }}">Xác thực tài khoản</a>
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
