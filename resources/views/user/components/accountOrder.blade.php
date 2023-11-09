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
                                <a class="title-info" href="{{ route('user.account') }}">Tài khoản của
                                    tôi</a>
                            </li>
                            <li>
                                <a class="title-info active" href="{{ route('account-order') }}">Đơn hàng của tôi</a>
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
                    <h1 class="title-head margin-top-0">Đơn hàng của tôi</h1>
                    <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
                        <div class="my-account">
                            <div class="dashboard">
                                <div class="recent-orders">
                                    <div class="table-responsive-block tab-all" style="overflow-x:auto;">
                                        <table class="table table-cart table-order" id="my-orders-table">
                                            <thead class="thead-default">
                                                <tr>
                                                    <th colspan="3">Mã đơn hàng</th>
                                                    <th colspan="3">Ngày mua</th>
                                                    <th colspan="3">Giá trị<br>đơn hàng</th>
                                                    <th colspan="3">Trạng thái vận chuyển</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($orderDetails) > 0)
                                                    @foreach ($orderDetails as $item)
                                                        <tr>
                                                            <td colspan="3">
                                                                <p>{{ $item->order_id }}</p>
                                                            </td>
                                                            <td colspan="3">
                                                                <p>{{ $item->updated_at }}</p>
                                                            </td>
                                                            <td colspan="3">
                                                                <p
                                                                    style="    color: red;
                                                                font-weight: bold;">
                                                                    {{ number_format($item->price, 0, ',', '.') }}VND</p>
                                                            </td>
                                                            <td colspan="3">

                                                                @if ($item->status == 0)
                                                                    <p class="badge badge-warning">
                                                                        {{ $selectStatus[$item->status] }}</p>
                                                                @elseif($item->status == 1)
                                                                    <p class="badge badge-info">
                                                                        {{ $selectStatus[$item->status] }}</p>
                                                                @else
                                                                    <p class="badge badge-success">
                                                                        {{ $selectStatus[$item->status] }}</p>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="6">
                                                            <p>Không có đơn hàng nào.</p>
                                                        </td>
                                                    </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                    <div
                                        class="paginate-pages pull-right page-account text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
