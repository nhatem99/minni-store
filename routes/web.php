<?php

use App\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
// Route::get('/userlogin', 'UserLoginController@index')->name('user.login');
// Route::get('auth/google/callback',);
Route::get('auth/google/callback', function () {
    $user = Socialite::driver('google')->user();
    if (Account::where('email', $user->email)->count() > 0) {
        if (Auth::guard('account')->attempt([
            'email' => $user->email,
            'password' =>  $user->id,
        ])) {
            return redirect()->route('user.index')->with('status', 'succsec');
        }
    }
    Account::create([
        'email' => $user->email,
        'name' => $user->name,
        'avatar' => 'dasdasads',
        'password' => Hash::make($user->id),
        'verify_account' => true,
    ]);
    if (Auth::guard('account')->attempt([
        'email' => $user->email,
        'password' =>  $user->id,
    ])) {
        return redirect()->route('user.index')->with('status', 'succsec');
    }
});
Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login_google');
Route::get('auth/facebook/callback', function () {
    // $user = Socialite::dirve('google')->user();
    return 'callback login facebook';
});
Route::get('auth/facebook', function () {
    // $user = Socialite::dirve('google')->user();
    return Socialite::driver('facebook')
        ->redirect();
});
Route::get('chinh-sach-rieng-tu', function () {
    return '<h1>Chinh sach ring tu</h1>';
});
Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('admin', 'AdminDashboardController@show')->name('dashboard');

    // Quản Lý Người Dùng
    Route::group(['prefix' => 'admin/user'], function () {
        Route::get('/', 'AdminUserController@list');
        Route::get('list', 'AdminUserController@list');

        Route::get('add', 'AdminUserController@add')->name('user.add');

        Route::post('store', 'AdminUserController@store');

        Route::get('delete/{id}', 'AdminUserController@delete')->name('delete_user');

        Route::get('action', 'AdminUserController@action');

        Route::get('update/{id}', 'AdminUserController@getUpdate')->name('user.update');

        Route::post('update/{id}', 'AdminUserController@postUpdate');
    });
    Route::group(['prefix' => 'admin/account'], function () {
        Route::get('/', 'AdminAccountUserController@list');
        Route::get('list', 'AdminAccountUserController@list');
        Route::get('add', 'AdminAccountUserController@add')->name('account.add');

        Route::post('store', 'AdminAccountUserController@store');

        Route::get('delete/{id}', 'AdminAccountUserController@delete')->name('delete_account');

        Route::get('action', 'AdminAccountUserController@action');

        Route::get('update/{id}', 'AdminAccountUserController@getUpdate')->name('account.update');

        Route::post('update/{id}', 'AdminAccountUserController@postUpdate');
    });
    //Quản lý trang
    Route::group(['prefix' => 'admin/page'], function () {
        Route::get('/', 'AdminPageController@list');
        Route::get('list', 'AdminPageController@list');

        Route::get('add', 'AdminPageController@getAdd');
        Route::post('add', 'AdminPageController@postAdd');

        Route::get('update/{id}', 'AdminPageController@getUpdate')->name('page.update');
        Route::post('update/{id}', 'AdminPageController@postUpdate');

        Route::get('delete/{id}', 'AdminPageController@delete')->name('page.delete');

        Route::get('action', 'AdminPageController@action')->name('page.action');
    });

    //Quản lý bài viết
    Route::group(['prefix' => 'admin/post'], function () {
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'AdminCategoryPostController@list')->name('categoryPost.list');

            Route::post('/', 'AdminCategoryPostController@postAdd');

            Route::get('update/{id}', 'AdminCategoryPostController@getUpdate')->name('categoryPost.update');
            Route::post('update/{id}', 'AdminCategoryPostController@postUpdate');

            Route::get('delete/{id}', 'AdminCategoryPostController@delete')->name('categoryPost.delete');
        });

        Route::get('/', 'AdminPostController@list')->name('post.list');
        Route::get('list', 'AdminPostController@list')->name('post.list');

        Route::get('add', 'AdminPostController@getAdd')->name('post.add');
        Route::post('add', 'AdminPostController@postAdd');

        Route::get('update/{id}', 'AdminPostController@getUpdate')->name('post.update');
        Route::post('update/{id}', 'AdminPostController@postUpdate');

        Route::get('delete/{id}', 'AdminPostController@delete')->name('post.delete');

        Route::get('seen/{id}', 'AdminPostController@seen')->name('post.seen');

        Route::get('action', 'AdminPostController@action')->name('post.action');
    });

    //Quản lý sản phẩm
    Route::group(['prefix' => 'admin/product'], function () {
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'AdminCategoryProductController@list')->name('category.list');

            Route::post('/', 'AdminCategoryProductController@postAdd');

            Route::get('update/{id}', 'AdminCategoryProductController@getUpdate')->name('category.update');
            Route::post('update/{id}', 'AdminCategoryProductController@postUpdate');

            Route::get('delete/{id}', 'AdminCategoryProductController@delete')->name('category.delete');
        });

        Route::group(['prefix' => 'image'], function () {
            Route::get('/{id}', 'AdminProductImageController@list')->name('image.list');

            Route::post('/{id}', 'AdminProductImageController@postAdd');

            Route::get('{id}/action', 'AdminProductImageController@action')->name('image.action');

            Route::get('delete/{id}', 'AdminProductImageController@delete')->name('image.delete');
        });

        Route::group(['prefix' => 'color'], function () {
            Route::get('/{id}', 'AdminProductColorController@list')->name('color.list');

            Route::post('/{id}', 'AdminProductColorController@postAdd');

            Route::get('{id}/action', 'AdminProductColorController@action')->name('color.action');

            Route::get('delete/{id}', 'AdminProductColorController@delete')->name('color.delete');
        });

        Route::group(['prefix' => 'size'], function () {
            Route::get('/{id}', 'AdminProductSizeController@list')->name('size.list');

            Route::post('/{id}', 'AdminProductSizeController@postAdd');

            Route::get('{id}/action', 'AdminProductSizeController@action')->name('size.action');

            Route::get('delete/{id}', 'AdminProductSizeController@delete')->name('size.delete');
        });


        Route::get('/', 'AdminProductController@list')->name('product.list');
        Route::get('list', 'AdminProductController@list')->name('product.list');

        Route::get('add', 'AdminProductController@getAdd')->name('product.add');
        Route::post('add', 'AdminProductController@postAdd');

        Route::get('update/{id}', 'AdminProductController@getUpdate')->name('product.update');
        Route::post('update/{id}', 'AdminProductController@postUpdate');

        Route::get('delete/{id}', 'AdminProductController@delete')->name('product.delete');

        Route::get('seen/{id}', 'AdminProductController@seen')->name('product.seen');

        Route::get('action', 'AdminProductController@action')->name('product.action');

        Route::get('featured/{id}', 'AdminProductController@featured')->name('product.featured');
    });

    Route::group(['prefix' => 'admin/order'], function () {
        Route::get('/', 'AdminOrderController@index')->name('order.index');
        Route::get('action', 'AdminOrderController@action')->name('order.action');
        Route::get('{id}', 'AdminOrderController@seen')->name('order.seen');
        Route::post('{id}', 'AdminOrderController@changeStatus')->name('order.change');
        Route::get('cancel/{id}', 'AdminOrderController@cancel')->name('order.cancel');
    });

    //Quản lý sliders
    Route::group(['prefix' => 'admin/slider'], function () {
        Route::get('/', 'AdminSliderController@list')->name('slider.list');
        Route::get('list', 'AdminSliderController@list')->name('slider.list');

        Route::post('list', 'AdminSliderController@postAdd');

        Route::get('update/{id}', 'AdminSliderController@getUpdate')->name('slider.update');
        Route::post('update/{id}', 'AdminSliderController@postUpdate');

        Route::get('delete/{id}', 'AdminSliderController@delete')->name('slider.delete');

        Route::get('action', 'AdminSliderController@action')->name('slider.action');
    });

    //Quản lý permission
    Route::group(['prefix' => 'admin/permission'], function () {
        Route::group(['prefix' => 'group'], function () {
            Route::get('/', 'AdminGroupPermissionController@list')->name('groupPermission.list');

            Route::post('/', 'AdminGroupPermissionController@store');

            // Route::get('update/{id}', 'AdminGroupPermissionController@getUpdate')->name('groupPermission.update');
            // Route::post('update/{id}', 'AdminGroupPermissionController@postUpdate');

            Route::get('delete/{id}', 'AdminGroupPermissionController@delete')->name('groupPermission.delete');
        });

        Route::get('/', 'AdminPermissionController@list')->name('permission.list');

        Route::post('/', 'AdminPermissionController@store');

        // Route::get('update/{id}', 'AdminPostController@getUpdate')->name('post.update');
        // Route::post('update/{id}', 'AdminPostController@postUpdate');

        Route::get('delete/{id}', 'AdminPermissionController@delete')->name('permission.delete');
    });

    // Quản lý role
    Route::group(['prefix' => 'admin/role'], function () {
        Route::get('/', 'AdminRoleController@list')->name('role.list');

        Route::get('add', 'AdminRoleController@add')->name('role.add');
        Route::post('add', 'AdminRoleController@postAdd');

        Route::get('update/{id}', 'AdminRoleController@getUpdate')->name('role.update');
        Route::post('update/{id}', 'AdminRoleController@postUpdate');

        Route::get('delete/{id}', 'AdminRoleController@delete')->name('role.delete');

        // Route::get('action', 'AdminSliderController@action')->name('slider.action');
    });
});

Route::group(['namespace' => 'User'], function () {

    Route::get('/userlogin', 'UserLoginController@index')->name('user.login');
    Route::post('/userlogin', 'UserLoginController@postLogin')->name('user.login');
    Route::post('/userlogout', 'UserLoginController@logout')->name('user.logout');
    Route::get('/register', 'UserLoginController@create')->name('user.register');
    Route::get('/verify', 'UserLoginController@verify')->name('user.verify');
    Route::get('/account', 'UserLoginController@infoAccount')->name('user.account');
    Route::get('/account/order', 'UserLoginController@accountOrder')->name('account-order');
    Route::get('/account/addresses', 'UserLoginController@infoAddress')->name('user.address');
    Route::post('/account/addresses', 'UserLoginController@postInfoAddress')->name('user.postAddress');
    Route::get('/account/changepassword', 'UserLoginController@getChangePassword')->name('user.changepass');
    Route::post('/account/changepassword', 'UserLoginController@postChangePassword')->name('postchangepass');
    Route::get('/verify/{id}', 'UserLoginController@sendmail')->name('user.verify-sendmail');
    Route::post('/verify/{id}', 'UserLoginController@verifyConfirm')->name('user.verify-confirm');
    Route::post('/store', 'UserLoginController@store')->name('user.store');
    Route::get('/info', 'UserLoginController@info')->name('user.info');
    Route::get('/reset-password', 'ResetPasswordController@writeMail')->name('write.mail');
    Route::post('/reset-password', 'ResetPasswordController@sendMail')->name('send.mail');
    Route::get('/confirm-password', 'ResetPasswordController@confirm')->name('confirm.password');
    Route::post('/confirm-password', 'ResetPasswordController@reset')->name('reset.password');

    Route::get('/', 'UserHomeController@index')->name('user.index');

    Route::get('tim-kiem', 'UserProductController@search')->name('user.search');
    Route::get('autocomplete', 'UserProductController@autocomplete')->name('user.autocomplete');
    Route::get('hoan-thanh-don-hang', 'UserCartController@complete')->name('user.complete');

    Route::get('thanh-toan', 'UserCartController@checkout')->name('user.checkout');
    Route::post('thanh-toan', 'UserCartController@postCheckout')->name('user.postCheckout');

    Route::get('page/{id}', 'UserHomeController@page')->name('user.page');

    Route::get('blog/{slug?}', 'UserPostController@post')->name('user.blog');
    Route::get('{slugCate}/{slugPost}.html', 'UserPostController@postDetail')->name('user.postDetail');

    Route::get('{slugCategory}/{slugProduct}', 'UserProductController@productDetail')->where('slugCategory', '^(?!.*cart).*$')->name('product.detail');
    Route::get('{slugCategory}', 'UserProductController@category')->where('slugCategory', '^(?!.*cart).*$')->name('user.category');




    Route::group(['prefix' => 'cart', 'middleware' => ['checklogin']], function () {
        Route::get('/', 'UserCartController@show')->name('cart.show');
        Route::get('addProductCart/{id}', 'UserCartController@addProductCart')->name('cart.addProduct');
        Route::get('add/{id}', 'UserCartController@addCart')->name('cart.add');
        Route::get('update', 'UserCartController@updateCart')->name('cart.update');
        Route::get('delete/{rowId}', 'UserCartController@deleteCart')->name('cart.delete');
        Route::get('user/{id}', 'UserCartController@cartUsers')->name('cart.user');
    });
});
