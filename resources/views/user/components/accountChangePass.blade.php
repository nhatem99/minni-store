@extends('layouts.user')
@section('title', 'Thông tin tài khoản')
@section('css')
    <link href="{{ asset('public/users/css/import/account.css') }}" rel="stylesheet" type="text/css" />
@endsection
{{-- @section('main_class', 'complete-page') --}}
@section('content')
    <section class="bread-crumb d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-12 a-left">
                    <ul class="breadcrumb">
                        <li class="home d-none">
                            <a href="/"><span>Trang chủ</span></a>
                            <span class="mr_lr">&nbsp;/&nbsp;</span>
                        </li>

                        <li class="last">
                            <strong><span>Tài khoản</span></strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="signup page_customer_account">
        <div class="container">
            <div class="row">
                <div class="col-left-ac">
                    <div class="block-account">
                        <div class="info info-1">
                            <img src="//bizweb.dktcdn.net/100/438/408/themes/919724/assets/account_ava.jpg?1699335966065"
                                alt="Hoang Nhat">
                            <p>Hoang Nhat</p>
                            <a class="click_logout" href=""
                                onclick="event.preventDefault();
                            document.getElementById('account-logout-form').submit();">Đăng
                                xuất</a>
                            <form id="account-logout-form" action="{{ route('user.logout') }}" method="POST"
                                class="d-none">
                                <input type="hidden" name="_token" value="Cu0GR9sU0AgoBU3nZdFXRPB7Md8tyFON6uRLXMV1">
                            </form>
                        </div>
                        <ul>
                            <li>
                                <a class="title-info" href="{{ route('user.account') }}">Tài khoản của
                                    tôi</a>
                            </li>
                            <li>
                                <a class="title-info " href="{{ route('account-order') }}">Đơn hàng của tôi</a>
                            </li>
                            <li>
                                <a class="title-info active" href="{{ route('user.changepass') }}">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a class="title-info" href="{{ route('user.address') }}">Sổ địa chỉ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-right-ac">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('errors'))
                        <div class="alert alert-danger">
                            {{ session('errors') }}
                        </div>
                    @endif
                    <h1 class="title-head margin-top-0">Đổi mật khẩu<span>(Để bảo mật tài khoản, vui lòng không chia sẻ mật
                            khẩu cho người khác)</span></h1>
                    <form method="post" action="{{ route('postchangepass') }}" id="change_customer_password"
                        accept-charset="UTF-8">
                        @csrf
                        <input name="FormType" type="hidden" value="change_customer_password"><input name="utf8"
                            type="hidden" value="true">
                        <div class="form-signup clearfix row">
                            <fieldset class="form-group col-12">
                                <label for="oldPass">Mật khẩu hiện tại <span class="error">*</span></label>
                                <input type="password" name="OldPassword" id="OldPass" required=""
                                    class="form-control form-control-lg">
                                <a class="forgot" href="{{ route('write.mail') }}">QUÊN MẬT KHẨU?</a>
                            </fieldset>
                            <fieldset class="form-group col-12">
                                <label for="changePass">Mật khẩu mới <span class="error">*</span></label>
                                <input type="password" name="Password" id="changePass" required=""
                                    class="form-control form-control-lg">
                            </fieldset>
                            <fieldset class="form-group col-12">
                                <label for="confirmPass">Xác nhận mật khẩu mới <span class="error">*</span></label>
                                <input type="password" name="ConfirmPassword" id="confirmPass" required=""
                                    class="form-control form-control-lg">
                            </fieldset>
                        </div>
                        <p class="btn-page">
                            <a href="{{ route('user.account') }}">Hủy</a>
                            <button class="button-default" type="submit"><i class="hoverButton"></i>Lưu</button>
                            <a class="forgot d-block d-md-none" href="{{ route('write.mail') }}">Quên mật khẩu?</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
