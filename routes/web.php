<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/login','App\Http\Controllers\HomeController@index');
Route::get('/register','App\Http\Controllers\HomeController@index');
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/contact', function () {
    return view('pages.contact');
});
Route::post('/register', 'App\Http\Controllers\UserController@store');
// Route::get('/register', 'App\Http\Controllers\UserController@tmp');
Route::post('/login', 'App\Http\Controllers\UserController@check')->name('login');
Route::post('/product/rate', 'App\Http\Controllers\ProductController@rate');
Route::post('/wishlist/{product}', 'App\Http\Controllers\UserController@wishlist');
Route::get('/wishlist', 'App\Http\Controllers\HomeController@wishlist');
Route::get('/wishlist/remove/{product}', 'App\Http\Controllers\UserController@removeWishlist');
Route::post('/comment', 'App\Http\Controllers\UserController@comment');
Route::get('/comment/remove/{product}', 'App\Http\Controllers\UserController@removeComment');
Route::post('/cart', 'App\Http\Controllers\CartController@store');

Route::group(['middleware'=>'userAuth'],function(){
    Route::get('/notification', 'App\Http\Controllers\UserController@notification');
    Route::post('/vendor/rate', 'App\Http\Controllers\VendorController@rate');
    Route::get('/profile', 'App\Http\Controllers\UserController@profile');
    Route::patch('/profile/{user}', 'App\Http\Controllers\UserController@update');
    Route::post('/add/address', 'App\Http\Controllers\UserController@addNewAddress');
    Route::get('/orderHistory', 'App\Http\Controllers\UserController@orderHistory');
    Route::get('/wallet', 'App\Http\Controllers\UserController@wallet');
    Route::get('/logout', 'App\Http\Controllers\UserController@logout');
    Route::get('/cart', 'App\Http\Controllers\CartController@index');
    Route::get('/cart/remove/{cart}', 'App\Http\Controllers\CartController@destroy');
    Route::get('/checkoutAddress', 'App\Http\Controllers\AddressController@index');
    Route::post('/paymentMethod', 'App\Http\Controllers\PaymentMethodController@show');
    Route::post('/makeOrder', 'App\Http\Controllers\OrderController@makeOrder');
    Route::post('/complete/order', 'App\Http\Controllers\OrderController@receipt');    
    Route::get('/order/cancel/{order}', 'App\Http\Controllers\OrderController@cancelOrder');
});

Route::get('/category/{content}', 'App\Http\Controllers\HomeController@products');
Route::get('/seller/{content}', 'App\Http\Controllers\HomeController@seller');
Route::get('/product/{product}', 'App\Http\Controllers\HomeController@product');

Route::prefix('vendor')->group(function(){
    Route::controller(App\Http\Controllers\VendorController::class)->group(function () {
        Route::get('/', 'signin')->middleware('alreadyLogin');
        Route::post('/', 'check');
        // Route::get('/signup', 'signup')->middleware('alreadyLogin');
        // Route::post('/signup', 'store');
        Route::get('/dashboard', 'view')->middleware('vendorAuth');
        Route::get('/dashboard/edit', 'edit')->middleware('vendorAuth');
        Route::patch('/dashboard/edit', 'update')->middleware('vendorAuth');
        Route::get('/logout', 'logout')->middleware('vendorAuth');
    });
    

    Route::prefix('product')->group(function () {
        Route::controller(App\Http\Controllers\VendorProductController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/add', 'add');
            Route::post('/', 'store');
            Route::get('{product}', 'edit');
            Route::patch('{product}', 'update');
            Route::get('delete/{product}', 'destroy');
        });
    });

    Route::prefix('orders')->group(function () {
        Route::controller(App\Http\Controllers\VendorOrderController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('{order}', 'edit');
            Route::patch('{order}', 'update');
        });
    });
});

Route::prefix('admin')->group(function () {

    Route::controller(App\Http\Controllers\AdminController::class)->group(function () {
        Route::get('/', 'signin')->middleware('alreadyLogin');
        Route::post('/', 'check');
        Route::get('/signup', 'signup')->middleware('alreadyLogin');
        Route::post('/signup', 'store');
        Route::get('/dashboard', 'view')->middleware('adminAuth');
        Route::get('/logout', 'logout')->middleware('adminAuth');
    });

    Route::prefix('orders')->group(function () {
        Route::controller(App\Http\Controllers\OrderController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/add', 'add');
            Route::post('/', 'store');
            Route::get('{order}', 'edit');
            Route::patch('{order}', 'update');
            Route::get('delete/{order}', 'destroy');
        });
    });

    Route::prefix('brand')->group(function () {
        Route::controller(App\Http\Controllers\BrandController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/add', 'add');
            Route::post('/', 'store');
            Route::get('{brand}', 'edit');
            Route::patch('{brand}', 'update');
            Route::get('delete/{brand}', 'destroy');
        });
    });

    Route::prefix('category')->group(function () {
        Route::controller(App\Http\Controllers\CategoryController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/add', 'add');
            Route::post('/', 'store');
            Route::get('{category}', 'edit');
            Route::patch('{category}', 'update');
            Route::get('delete/{category}', 'destroy');
        });
    });

    Route::prefix('discount')->group(function () {
        Route::controller(App\Http\Controllers\DiscountController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/add', 'add');
            Route::post('/', 'store');
            Route::get('{discount}', 'edit');
            Route::patch('{discount}', 'update');
            Route::get('delete/{discount}', 'destroy');
        });
    });

    Route::prefix('attribute')->group(function () {
        Route::controller(App\Http\Controllers\AttributeController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/add', 'add');
            Route::post('/', 'store');
            Route::get('{attribute}', 'edit');
            Route::patch('{attribute}', 'update');
            Route::get('delete/{attribute}', 'destroy');
        });
    });

    Route::prefix('product')->group(function () {
        Route::controller(App\Http\Controllers\ProductController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/add', 'add');
            Route::post('/', 'store');
            Route::get('{product}', 'edit');
            Route::patch('{product}', 'update');
            Route::get('delete/{product}', 'destroy');
        });
    });

    Route::prefix('user')->middleware('adminAuth')->group(function () {
        Route::controller(App\Http\Controllers\UserController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/add', 'add');
            Route::post('/', 'store');
            Route::get('{user}', 'edit');
            Route::patch('{user}', 'update');
            Route::get('delete/{user}', 'destroy');
        });
    });

    Route::prefix('paymentMethod')->group(function () {
        Route::controller(App\Http\Controllers\PaymentMethodController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/add', 'add');
            Route::post('/', 'store');
            Route::get('{paymentMethod}', 'edit');
            Route::patch('{paymentMethod}', 'update');
            Route::get('delete/{paymentMethod}', 'destroy');
        });
    });

    Route::prefix('advertisment')->group(function () {
        Route::controller(App\Http\Controllers\AdvertismentController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/add', 'add');
            Route::post('/', 'store');
            Route::get('{advertisment}', 'edit');
            Route::patch('{advertisment}', 'update');
            Route::get('delete/{advertisment}', 'destroy');
        });
    });

});
