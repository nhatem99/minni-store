@extends('layouts.user')
@section('title', 'Minni Store')
@section('css')
    {{-- <link rel="stylesheet" href={{ asset('public/users/css/import/resetPassword.css') }}> --}}
    <link rel="stylesheet" href={{ asset('public/users/css/import/login.css') }}>
@endsection
@section('main_class', 'home-page')
@section('content')
    <div class="page-content-account">
        <div class="container">
            <div class="d-group">
                <div class="left-col">
                    <div class="group-login group-recover">
                        <h2>Xác nhận mật khẩu</h2>
                        <form method="POST" action="{{ route('reset.password') }}">
                            <input name="FormType" type="hidden" value="recover_customer_password">
                            @csrf
                            <input name="utf8" type="hidden" value="true">
                            <fieldset class="form-group">
                                <input type="password" name="token" class="form-control input_user" value=""
                                    placeholder="Confirm password reset" style="margin-bottom: 10px;">
                            </fieldset>
                            @error('token')
                                <small class="text-danger d-block">{{ $message }}</small>
                            @enderror
                            <fieldset class="form-group">
                                <input type="password" name="password" class="form-control input_pass" value=""
                                    placeholder="New password" style="margin-bottom: 10px;">
                            </fieldset>
                            @error('password')
                                <small class="text-danger d-block">{{ $message }}</small>
                            @enderror
                            {{-- <a href="{{ route('user.login') }}" class="btn-ref">HỦY</a> --}}
                            <input class="btn-login" type="submit" value="TIẾP TỤC">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
