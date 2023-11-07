@extends('layouts.user')
@section('title', 'Minni Store')
@section('css')
    <link href="{{ asset('public/users/css/import/login.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('main_class', 'home-page')
@section('content')

    <div class="page-content-account">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('dangerous'))
            <div class="alert alert-danger">
                {{ session('dangerous') }}
            </div>
        @endif
        <div class="container">
            <div class="d-group">
                <div class="left-col">
                    <div class="group-login group-log">
                        <h1 class="d-none d-md-block"><span>ĐĂNG</span> NHẬP</h1>
                        <div class="acc-top-mb d-block d-md-none">
                            <span style="display: block; margin-bottom: 48px; color: #595959; font-weight: 400;">Chào
                                mừng bạn đến với Yody!</span>
                            <h1><span>ĐĂNG</span> NHẬP</h1>
                        </div>
                        <form method="post" action="{{ route('user.login') }}"id="customer_login" accept-charset="UTF-8">
                            @csrf
                            <fieldset class="form-group">
                                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                    class="form-control form-control-lg" value="" name="email" id="customer_email"
                                    placeholder="Email" oninput="inputFunctionEmail()">
                                <span id="errorEmailText" class="errorEmailText"></span>
                            </fieldset>
                            <fieldset class="form-group">
                                <input type="password" class="form-control form-control-lg" value="" name="password"
                                    id="customer_password" placeholder="Mật khẩu" oninput="inputFunctionPass()">
                                <span class="showpass"></span>
                                {{-- <span id="errorPassText" class="errorPassText"></span> --}}
                            </fieldset>
                            <button class="btn-login btn-login-form" type="submit" value="Đăng nhập"
                                style="width:100%;margin-bottom:16px">Đăng nhập</button>
                            <p class="d-block d-md-none forgot-mb"><a href="#"
                                    onclick="showRecoverPasswordForm();return false;" style="font-weight: 600">Quên mật
                                    khẩu</a></p>
                        </form>
                        <p class="forgot">
                            <a class="d-none d-md-block" href="{{ route('write.mail') }}">Quên mật khẩu</a>
                        </p>
                        <p class="loginOr">
                            <span>Hoặc đăng nhập bằng</span>
                        </p>
                        <div class="block social-login--facebooks">
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
                                    <a href="javascript:void(0)" class="social-login--google" onclick="loginGoogle()"><img
                                            width="129px" height="37px" alt="google-login-button"
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
                        </div>
                        <div class="register">
                            Bạn chưa có tài khoản? <a href="{{ route('user.register') }}">Đăng ký ngay!</a>
                        </div>
                    </div>
                    <div class="group-login group-recover d-none">
                        <h2>QUÊN MẬT KHẨU</h2>
                        <p class="description">Nếu bạn quên mật khẩu, vui lòng nhập địa chỉ email đã đăng ký của bạn.
                            Chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu.</p>
                        <form method="post" action="/account/recover" id="recover_customer_password"
                            accept-charset="UTF-8"><input name="FormType" type="hidden"
                                value="recover_customer_password"><input name="utf8" type="hidden" value="true">
                            <fieldset class="form-group">
                                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                    class="form-control form-control-lg" value="" name="Email" id="recover-email"
                                    placeholder="Nhập email" required="">
                            </fieldset>
                            <a href="#" class="btn-ref" onclick="hideRecoverPasswordForm();return false;">HỦY</a>
                            <input class="btn-login" type="submit" value="TIẾP TỤC">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
