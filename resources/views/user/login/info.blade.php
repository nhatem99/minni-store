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
                            <a class="click_logout" href="{{ route('user.logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Đăng
                                xuất</a>
                            <form id="logout-form" action="https://minni-store.online/userlogout" method="POST"
                                class="d-none">
                                <input type="hidden" name="_token" value="Cu0GR9sU0AgoBU3nZdFXRPB7Md8tyFON6uRLXMV1">
                            </form>
                        </div>
                        <ul>
                            <li>
                                <a class="title-info active" href="{{ route('user.account') }}">Tài khoản của
                                    tôi</a>
                            </li>
                            <li>
                                <a class="title-info" href="{{ route('account-order') }}">Đơn hàng của tôi</a>
                            </li>
                            <li>
                                <a class="title-info" href="{{ route('user.changepass') }}">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a class="title-info" href="{{ route('user.address') }}">Sổ địa chỉ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-right-ac">
                    <h1 class="title-head margin-top-0">Thông tin cá nhân
                        {{-- <a href="{{route('user.address')}}" class="btn-edit-addr btn btn-primarys btn-more">Sửa thông tin</a> --}}
                        <button
                            class="btn-edit-addr btn btn-primarys btn-more" type="button"
                            onclick="window.location.href='{{ route('user.address') }}'">Sửa thông tin</button></h1>
                    <div class="form-signup name-account m992">
                        <p><strong>Họ và tên:</strong> Hoang Nhat</p>
                        <p><strong>Địa chỉ email:</strong> hoangvuminhnhat1@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
