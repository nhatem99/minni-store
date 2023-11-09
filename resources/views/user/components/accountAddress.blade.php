@extends('layouts.user')
@section('title', 'Thông tin tài khoản')
@section('css')
    <link href="{{ asset('public/users/css/import/account.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/select2/select2.min.css') }}">
@endsection
{{-- @section('main_class', 'complete-page') --}}
@section('content')
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
                                <a class="title-info " href="{{ route('account-order') }}">Đơn hàng của tôi</a>
                            </li>
                            <li>
                                <a class="title-info" href="{{ route('user.changepass') }}">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a class="title-info active" href="{{ route('user.address') }}">Sổ địa chỉ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-right-ac">
                    <h1 class="title-head">Địa chỉ của bạn<button class="btn-edit-addr btn btn-primarys btn-more"
                            type="button" data-toggle="modal" data-target="#exampleModalCenter"> Sửa địa chỉ</button></h1>
                    <div class="total_address">
                        <div id="view_address_25144083" class="customer_address">
                            <div class="address_info">
                                <div class="address-group">
                                    <div class="address form-signup">
                                        <p><strong>Họ tên: </strong>

                                            @if ($account->name)
                                                {{ $account->name }}
                                            @endif
                                        </p>
                                        <p>
                                            <strong>Địa chỉ:</strong>
                                            @if ($account->full_address)
                                                {{ $account->full_address }}
                                            @endif
                                        </p>
                                        <p><strong>Số điện thoại:</strong>
                                            @if ($account->phone_number)
                                                {{ $account->phone_number }}
                                            @endif
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thông tin địa chỉ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.postAddress') }}" name="customer_address"
                        id="customer_address">
                        @csrf
                        <div class="section-detail form_address">
                            <div class="row">
                                <div class="field col-md-6">
                                    <fieldset class="form-group">
                                        <input type="text" name="FullName" class="form-control"
                                            data-validation-error-msg="Không được để trống" value="{{ $account->name }}"
                                            onchange="checkInput(event,'FullName')" autocapitalize="words">
                                        <label>Họ tên</label>
                                    </fieldset>
                                    <p class="error-msg"></p>
                                </div>
                                <div class="field col-md-6">
                                    <fieldset class="form-group">
                                        <input type="number" class="form-control" id="Phone" pattern="\d+"
                                            name="Phone" onchange="checkInput(event,'Phone')" maxlength="12"
                                            value="{{ $account->phone_number }}">
                                        <label>Số điện thoại</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="field">
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" name="Address"
                                        value="{{ $account->address }}" onchange="checkInput(event,'Address')">
                                    <label>Địa chỉ</label>
                                </fieldset>
                            </div>
                            <div class="group-country d-flex">
                                <fieldset class="form-group select-field not-vn">
                                    <select name="calc_shipping_provinces" id="provinces" value=""
                                        class="form-control add">
                                        @if ($account->province)
                                            <option value="{{ $account->provinces }}" hidden="">
                                                {{ $account->provinces }}</option>
                                        @else
                                            <option value="" hidden="">---</option>
                                        @endif

                                    </select>
                                    {{-- <label>Tỉnh thành</label> --}}
                                </fieldset>
                                <fieldset class="form-group select-field not-vn">
                                    <select name="calc_shipping_district" id="district"
                                        class="form-control add has-content" value="">
                                        @if ($account->district)
                                            <option value="{{ $account->district }}" hidden="">
                                                {{ $account->district }}</option>
                                        @endif
                                    </select>
                                    {{-- <label>Quận huyện</label> --}}
                                </fieldset>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer btn-row">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">
                        <h2>HỦY</h2>
                    </button>
                    <button type="button" class="btn btn-primary btn-submit">
                        <h2>LƯU</h2>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/sweetAlert2/sweetalert2@11.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/users/js/cart.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/select2/select2.min.js') }}"></script>
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
    <script>
        //<![CDATA[
        if (address_2 = localStorage.getItem('address_2_saved')) {
            $('select[name="calc_shipping_district"] option').each(function() {
                if ($(this).text() == address_2) {
                    $(this).attr('selected', '')
                }
            })

            $('input.billing_address_2').attr('value', address_2)
        }
        if (district = localStorage.getItem('district')) {
            $('select[name="calc_shipping_district"]').html(district)
            $('select[name="calc_shipping_district"]').on('change', function() {
                var target = $(this).children('option:selected')
                target.attr('selected', '')
                $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                address_2 = target.text()
                $('input.billing_address_2').attr('value', address_2)
                district = $('select[name="calc_shipping_district"]').html()
                localStorage.setItem('district', district)
                localStorage.setItem('address_2_saved', address_2)
            })
        }
        $('select[name="calc_shipping_provinces"]').each(function() {
            var $this = $(this),
                stc = ''
            c.forEach(function(i, e) {
                e += +1
                stc += '<option value="' + i + '">' + i + '</option>'
                $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
                if (address_1 = localStorage.getItem('address_1_saved')) {
                    $('select[name="calc_shipping_provinces"] option').each(function() {
                        if ($(this).text() == address_1) {
                            $(this).attr('selected', '')
                        }
                    })
                    $('input.billing_address_1').attr('value', address_1)
                }
                $this.on('change', function(i) {
                    i = $this.children('option:selected').index() - 1
                    var str = '',
                        r = $this.val()
                    if (r != '') {
                        arr[i].forEach(function(el) {
                            str += '<option value="' + el + '">' + el + '</option>'
                            $('select[name="calc_shipping_district"]').html(
                                '<option value="">Quận / Huyện</option>' + str)
                        })
                        var address_1 = $this.children('option:selected').text()
                        var district = $('select[name="calc_shipping_district"]').html()
                        localStorage.setItem('address_1_saved', address_1)
                        localStorage.setItem('district', district)
                        $('select[name="calc_shipping_district"]').on('change', function() {
                            var target = $(this).children('option:selected')
                            target.attr('selected', '')
                            $('select[name="calc_shipping_district"] option').not(target)
                                .removeAttr('selected')
                            var address_2 = target.text()
                            $('input.billing_address_2').attr('value', address_2)
                            district = $('select[name="calc_shipping_district"]').html()
                            localStorage.setItem('district', district)
                            localStorage.setItem('address_2_saved', address_2)
                        })
                    } else {
                        $('select[name="calc_shipping_district"]').html(
                            '<option value="">Quận / Huyện</option>')
                        district = $('select[name="calc_shipping_district"]').html()
                        localStorage.setItem('district', district)
                        localStorage.removeItem('address_1_saved', address_1)
                    }
                })
            })
        })

        $('#provinces').select2();
        $('#district').select2();

        $('.btn-submit').click(function() {
            $("form#customer_address").submit()
        })
        //]]>

        $('.form_address input[type=text]').each(function() {
            if (this.value !== '' && this.value !== null) {
                this.classList.add('has-content')
            } else {
                this.classList.remove('has-content')
            }
        });
        $('.form_address input[type=number]').each(function() {
            if (this.value !== '' && this.value !== null) {
                this.classList.add('has-content')
            } else {
                this.classList.remove('has-content')
            }
        });

        function checkInput(event, name) {

            if (event.target.value !== '') {
                $('input[name=' + name + ']').addClass('has-content');
            } else {
                $('input[name=' + name + ']').removeClass('has-content');
            }
        }
    </script>
@endsection
