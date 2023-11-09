@extends('layouts.user')
@section('title', 'Minni Store')
@section('css')
    <link rel="stylesheet" href={{ asset('public/users/css/import/login.css') }}>
@endsection
@section('main_class', 'home-page')
@section('content')
    <div class="page-content-account">
        <div class="container">
            <div class="d-group">
                <div class="left-col">
                    <div class="group-login group-recover">
                        <h2>QUÊN MẬT KHẨU</h2>
                        <p class="description">Nếu bạn quên mật khẩu, vui lòng nhập địa chỉ email đã đăng ký của bạn. Chúng
                            tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu.</p>
                        <form method="post" action="{{ route('send.mail') }}" id="recover_customer_password"
                            accept-charset="UTF-8"><input name="FormType" type="hidden" value="recover_customer_password">
                            @csrf
                            <input name="utf8" type="hidden" value="true">
                            <fieldset class="form-group">
                                <input type="text"
                                    class="form-control form-control-lg" value="" name="email" id="recover-email"
                                    placeholder="Nhập email" required="">
                            </fieldset>
                            <a href="{{ route('user.login') }}" class="btn-ref">HỦY</a>
                            <input class="btn-login" type="submit" value="TIẾP TỤC">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


