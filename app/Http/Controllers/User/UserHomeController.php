<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\CategoryProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\Slider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserHomeController extends Controller
{
    //
    function __construct()
    {
    }
    function index()
    {

        $sliders = Slider::where('status', 1)->latest()->get();
        $products = Product::where('featured', 1)->where('status', 1)->latest()->take(30)->get();
        $product_image = ProductImage::all();

        // Get Ao thun
        $catThun = CategoryProduct::select('id')->where('slug', '=', 'ao-thun-nam')->orWhere('slug', '=', 'ao-thun-nu')->limit(16)->get();
        foreach ($catThun as $item) {
            $catShirtIds[] = $item->id;
        }
        $productShirt1 = Product::whereIn('category_product_id', $catShirtIds)->where('status', 1)->latest()->take(16)->get();

        // Get Ao thun Polo
        $catThunPolo = CategoryProduct::select('id')->where('slug', '=', 'ao-polo-nam')->orWhere('slug', '=', 'ao-polo-nu')->limit(16)->get();
        foreach ($catThunPolo as $item) {
            $catShirtPoloIds[] = $item->id;
        }
        $productShirtPolo = Product::whereIn('category_product_id', $catShirtPoloIds)->where('status', 1)->latest()->take(16)->get();

        //Product Somi
        $catSoMi = CategoryProduct::select('id')->from('category_products')->where('slug', '=', 'ao-so-mi-nam')->orWhere('slug', '=', 'ao-so-mi-nu')->get();
        foreach ($catSoMi as $item) {
            $catSoMiIds[] = $item->id;
        }
        $productShirt2 = Product::whereIn('category_product_id', $catSoMiIds)->where('status', 1)->latest()->take(16)->get();

        $quanJean = CategoryProduct::select('id')->from('category_products')->where('slug', '=', 'quan-jeans-nam')->orWhere('slug', '=', 'quan-jeans-nu')->get();
        foreach ($quanJean as $item) {
            $quanJeanIds[] = $item->id;
        }
        $productQuanJean = Product::whereIn('category_product_id', $quanJeanIds)->where('status', 1)->latest()->take(8)->get();
        return view('user.index', compact('sliders', 'products', 'productShirt1', 'productShirt2', 'product_image', 'productQuanJean', 'productShirtPolo'));
    }

    function page($id)
    {
        $page = Page::find($id);
        return view('user.page', compact('page'));
    }
}
