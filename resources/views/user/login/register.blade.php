@extends('layouts.user')
@section('title', 'Minni Store')
@section('css')
    <link href="{{ asset('public/users/css/import/login.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('main_class', 'home-page')
@section('content')

    <div class="page-content-account">
        {{-- @if (session('dangerous'))
            <div class="alert alert-danger">
                {{ session('dangerous') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <div class="container">
            <div class="d-group">
                <div class="right-col">
                    <div class="group-login group-log">
                        <div class="mb-5 d-block page-signup-text">
                            Chào mừng bạn đến với Yody!
                        </div>
                        <h1 class="d-block">
                            <span class="page-signup-title page-signup-title-darkblue">ĐĂNG</span>
                            <span class="page-signup-title page-signup-title-yellow">KÝ</span>
                        </h1>
                        <form method="post" action="{{ route('user.store') }}" id="customer_register"
                            accept-charset="UTF-8"><input name="FormType" type="hidden" value="customer_register">
                            @csrf
                            <div id="responseErrors" class="d-none">
                            </div>
                            <div id="frmErrorText"
                                class="error page-signup-error d-none flex-column justflex-columnify-content-center align-items-center flex-column">
                            </div>
                            <fieldset class="form-group">
                                <input type="text" class="form-control form-control-lg mb-1" value=""
                                    name="first_name" id="first_name" placeholder="Họ và tên">
                                <div class="page-signup-error px-1">
                                    @error('signupName')
                                        <div>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <input placeholder="Số điện thoại" type="text" id="phone"
                                    class="form-control form-control-comment mb-1 form-control-lg" name="Phone">
                                <div class="page-signup-error px-1">
                                    @error('phoneNumber')
                                        <div>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <input type="text" class="form-control form-control-lg mb-1" value=""
                                    name="email" id="iptEmail" placeholder="Địa chỉ email">
                                <div class="page-signup-error px-1">
                                    @error('email')
                                        <div>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <input type="password" class="form-control form-control-lg mb-1" value=""
                                    name="password" id="password" placeholder="Mật khẩu">
                                <span class="showpass"></span>
                                <div class="page-signup-error px-1">
                                    @error('password')
                                        <div>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </fieldset>
                            <div class="page-signup-actions">
                                <button id="btnSubmit" class="btn-login btn-reg w-100" value="Đăng ký" type="submit">Đăng
                                    ký</button>
                            </div>
                            <div class="block social-login--facebooks d-block d-md-none">
                                <div class="a-center page-signup-or">
                                    <div class="page-signup-or-item d-inline-block px-1 bg-white">Hoặc đăng ký bằng</div>
                                </div>
                                <script>
                                    function loginFacebook() {
                                        var a = {
                                                client_id: "947410958642584",
                                                redirect_uri: "https://store.mysapo.net/account/facebook_account_callback",
                                                state: JSON.stringify({
                                                    redirect_url: window.location.href
                                                }),
                                                scope: "email",
                                                response_type: "code"
                                            },
                                            b = "https://www.facebook.com/v3.2/dialog/oauth" + encodeURIParams(a, !0);
                                        window.location.href = b
                                    }

                                    function loginGoogle() {
                                        var a = {
                                                client_id: "997675985899-pu3vhvc2rngfcuqgh5ddgt7mpibgrasr.apps.googleusercontent.com",
                                                redirect_uri: "https://store.mysapo.net/account/google_account_callback",
                                                scope: "email profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile",
                                                access_type: "online",
                                                state: JSON.stringify({
                                                    redirect_url: window.location.href
                                                }),
                                                response_type: "code"
                                            },
                                            b = "https://accounts.google.com/o/oauth2/v2/auth" + encodeURIParams(a, !0);
                                        window.location.href = b
                                    }

                                    function encodeURIParams(a, b) {
                                        var c = [];
                                        for (var d in a)
                                            if (a.hasOwnProperty(d)) {
                                                var e = a[d];
                                                null != e && c.push(encodeURIComponent(d) + "=" + encodeURIComponent(e))
                                            } return 0 == c.length ? "" : (b ? "?" : "") + c.join("&")
                                    }
                                </script>
                                <div class="d-flex justify-content-center page-signup-social-wrapper">
                                    <div class="page-signup-social">
                                        <a href="javascript:void(0)" class="social-login--google"
                                            onclick="loginGoogle()"><img width="129px" height="37px"
                                                alt="google-login-button"
                                                src="//bizweb.dktcdn.net/100/438/408/themes/919724/assets/ic_btn_google.svg?1699264419526"
                                                class="bg-white"
                                                style="height: 48px; width: 120px; border: 1px solid rgb(240, 240, 240); border-radius: 500px;"></a>
                                    </div>
                                    <div class="page-signup-social">
                                        <a href="javascript:void(0)" class="social-login--facebook"
                                            onclick="loginFacebook()"><img width="129px" height="37px"
                                                alt="facebook-login-button"
                                                src="//bizweb.dktcdn.net/100/438/408/themes/919724/assets/ic_btn_facebook.svg?1699264419526"
                                                class="bg-white"
                                                style="height: 48px; width: 120px; border: 1px solid rgb(240, 240, 240); border-radius: 500px;"></a>
                                    </div>
                                </div>
                                <div class="page-signup-redirect-login page-signup-text">
                                    <span>Bạn đã có tài khoản?</span>
                                    <a href="/account/login">Đăng nhập ngay!</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
