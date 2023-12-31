<?php

namespace App\Providers;

use App\Models\CategoryProduct;
use App\Models\OrderDetail;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
        $data['pages'] = Page::latest()->get();
        $data['categoryProductParentMale'] = CategoryProduct::where('parent_id', 0)->where('slug','like','%nam%')->get();
        $data['categoryProductParentFeMale'] = CategoryProduct::where('parent_id', 0)->where('slug','like','%nu%')->get();
        // dd( $data['categoryProductParentMale']);
        // $aa = CategoryProduct::where('parent_id', 0)->get();
        // dd($data['categoryProductParent']);
        $data['sellProducts'] = Product::join('order_details', 'products.id', '=', 'order_details.product_id')
            ->select('products.id', 'products.name', 'products.slug', 'products.feature_image', 'products.price', 'products.category_product_id')
            ->where('products.status', 1)
            ->groupBy('products.id', 'products.name', 'products.slug', 'products.feature_image', 'products.price', 'products.category_product_id')
            ->orderByRaw('SUM(order_details.quantity) desc')
            ->limit(8)
            ->get();
        view()->share($data);
        if(app()->environment('remote')){
            URL::forceScheme('https');
        }
    }
}
