<div class="sidebar fl-left">
    {{-- categoryProduct --}}
    {{-- @include('user.components.categoryProduct') --}}
    {{-- endCategoryProduct --}}
    {{-- filter product --}}
    <div class="section" id="filter-product-wp">
        <div class="section-head">
            <h3 class="section-title">Bộ lọc</h3>
        </div>
        <div class="section-detail">
            <form>
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Hãng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catFilter as $item)
                            <tr>
                                <td><input type="checkbox" name="r-brand[]" value="{{ $item->slug }}"
                                        id="{{ $item->id }}" @if (is_array($checkBrand)) {{ in_array($item->slug, $checkBrand) ? 'checked' : '' }} @endif
                                        {{ $item->slug == $catCheck ? 'checked' : '' }} />
                                </td>
                                <td><label for="{{ $item->id }}">{{ $item->name }}</label></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Giá</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="radio" {{ $checkPrice == 'duoi-3-trăm' ? 'checked' : '' }}
                                    name="r-price" value="duoi-3-trăm" id="-300000"></td>
                            <td><label for="-300000">Dưới 300.000đ</label></td>
                        </tr>
                        <tr>
                            <td><input type="radio" {{ $checkPrice == 'tu-3-4-trăm' ? 'checked' : '' }}
                                    name="r-price" value="tu-3-4-trăm" id="300000-400000"></td>
                            <td><label for="3000-400000">300.000đ - 400.000đ</label></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <input type="submit" class="btn btn-outline-primary" value="Xem kết quả">
                </div>
            </form>
        </div>
    </div>
    {{-- end --}}
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="{{ route('user.index') }}" title="" class="thumb">
                <img src="{{ asset('public/users/images/Banner1.png') }}" alt="">
            </a>
        </div>
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
    </div>

</div>
