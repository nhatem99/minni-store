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
                            Chào mừng bạn đến với 4MEN!
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
                                    @error('first_name')
                                        <div>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <input placeholder="Số điện thoại" type="number" id="phone"
                                    class="form-control form-control-comment mb-1 form-control-lg" name="Phone">
                                <div class="page-signup-error px-1">
                                    @error('Phone')
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
