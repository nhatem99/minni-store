<div class="sidebar fl-left">
    {{-- categoryProduct --}}
    {{-- @include('user.components.categoryProduct') --}}
    {{-- endCategoryProduct --}}
    <div class="section" id="selling-wp">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm bán chạy</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item">

                @foreach ($sellProducts as $item)
                    <li class="clearfix">
                        <a href="{{ route('product.detail', ['slugCategory' => $item->category->catProductParent->slug, 'slugProduct' => $item->slug]) }}"
                            title="" class="thumb fl-left">
                            <img class="img-product-sell" src="{{ asset($item->feature_image) }}">
                        </a>
                        <div class="info fl-right">
                            <a href="{{ route('product.detail', ['slugCategory' => $item->category->catProductParent->slug, 'slugProduct' => $item->slug]) }}"
                                title="" class="product-name">{{ $item->name }}</a>
                            <div class="price">
                                <span class="new">{{ number_format($item->price, 0, '', '.') }}đ</span>
                            </div>
                            <a href="{{ route('cart.addProduct', ['id' => $item->id]) }}" title=""
                                class="add-cart btn btn-outline-dark btn-sm"
                                data-account="{{ Auth::guard('account')->check() ? true : false }}"
                                data-verify="{{ Auth::guard('account')->check() && Auth::guard('account')->user()->verify_account == 1 ? 1 : 0 }}"
                                data-quantity="10" data-url="{{ route('cart.add', ['id' => $item->id]) }}"><i
                                    style="font-size: 17px; margin-right:5px" class="fa fa-shopping-cart"
                                    aria-hidden="true"></i><span>Thêm giỏ
                                    hàng</span></a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <div class="title">
                <a style="color: #11006F;" href="{{ route('user.category', 'ao-polo-nam') }}">
                    Áo Polo Thoải Mái Mỗi Ngày
                    </a>
            </div>
            <a href="{{ route('user.category', 'ao-polo-nam') }}" title="" class="thumb">
                <img src="{{ asset('public/users/images/banner-sidebar-polo.webp') }}" alt="">

            </a>
        </div>
        <div class="section-detail">
            <div class="title">
                <a style="color: #11006F;" href="{{ route('user.category', 'quan-jeans-nam') }}">
                    Quần Jeans
                    </a>
            </div>
            <a href="{{ route('user.category', 'quan-jeans-nam') }}" title="" class="thumb">
                <img src="{{ asset('public/users/images/banner-sidebar-jeans.webp') }}" alt="">

            </a>
        </div>
        <div class="section-detail">
            <div class="title">
                <a style="color: #11006F;" href="{{ route('user.category', 'ao-thun-the-thao-nu') }}">
                    Quần Áo Sport
                    </a>
            </div>
            <a href="{{ route('user.category', 'ao-thun-the-thao-nu') }}" title="" class="thumb">
                <img src="{{ asset('public/users/images/banner-sidebar-sport.webp') }}" alt="">

            </a>
        </div>
    </div>
</div>
{{-- Modal Add Cart --}}
@include('user.components.modalProductCart')
{{-- End Model Add Cart --}}
@include('user.components.modalAccountCart')
@include('user.components.modalVerifyAccount')
@include('user.components.modalCartNum')
{{-- Modal Notitfication --}}
@include('user.components.modalNotification')
{{-- endModal Notitfication --}}
