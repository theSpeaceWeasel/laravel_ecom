<?php

use Illuminate\Support\Facades\Route;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();


Route::get('/mail', function () {
    $name = "Funny Coder";

    // The email sending is done using the to method on the Mail facade
    Mail::to('thespeaceweasel@gmail.com')->send(new TestMail($name));
});







    Route::get('/', [App\Http\Controllers\Customer\MainController::class, 'index']);
    Route::get('/categories', [App\Http\Controllers\Customer\MainController::class, 'categories']);
    Route::get('/categories/{category:slug}', [App\Http\Controllers\Customer\MainController::class, 'products']);
    Route::get('/categories/{category:slug}/{product:slug}', [App\Http\Controllers\Customer\MainController::class, 'singleProduct']);
    Route::post('/categories/{category:slug}', [App\Http\Controllers\Customer\MainController::class, 'sort']);



    // search
    Route::get('/search', [App\Http\Controllers\SearchController::class, 'search']);

    //wishlist
    Route::controller(App\Http\Controllers\Customer\WishlistController::class)->group(function(){
        Route::get('wishlist', 'index');
        Route::post('wishlist', 'store');
        Route::delete('wishlist/delete/{wishlist}', 'destroy');
        
    });

    //cart
    Route::controller(App\Http\Controllers\Customer\CartController::class)->group(function(){
        Route::get('cart', 'index');
        Route::post('cart', 'store');
        Route::delete('cart/delete/{cart}', 'destroy');
        
    });

    //checkout
    Route::controller(App\Http\Controllers\Customer\CheckoutController::class)->group(function(){
        Route::get('checkout', 'index')->name('checkout');
        Route::get('orders', 'orders');
        Route::get('orders/{checkout}', 'showOrder');
        // Route::delete('cart/delete/{cart}', 'destroy');
        
    });

      //invoice
    Route::controller(App\Http\Controllers\InvoiceController::class)->group(function(){
        Route::post('invoice/download', 'download')->name('checkout');
    });


    Route::controller(App\Http\Controllers\PaypalController::class)->group(function(){
        Route::get('paypal/create', 'create');
        Route::get('paypal/success', 'success');
        Route::get('paypal/cancel', 'cancel');
    });

   Route::controller(App\Http\Controllers\StripeController::class)->group(function(){
        Route::post('stripe/create', 'create');
        Route::get('stripe/success', 'success')->name('stripe.success');
        Route::get('stripe/cancel', 'cancel')->name('stripe.cancel');
    });


   

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::prefix('admin')->middleware('auth','admin')->group(function(){
    //DASHBOARD
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
    Route::get('/', function(){
        return 'test';
    });


    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function(){
        Route::get('category', 'index')->name('category.index');
        Route::get('category/create', 'create')->name('category.create');
        Route::post('category', 'store')->name('category.store');
        Route::get('category/{category}/edit', 'edit')->name('category.edit');
        Route::put('category/{category}', 'update')->name('category.update');
    });

    Route::controller(App\Http\Controllers\Admin\BrandController::class)->group(function(){
        Route::get('brand', 'index');
        Route::get('brand/create', 'create');
        Route::post('brand', 'store');
        Route::get('brand/{brand}/edit', 'edit');
        Route::put('brand/{brand}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function(){
        Route::get('product', 'index');
        Route::get('product/create', 'create');
        Route::post('product', 'store');
        Route::get('product/{product}/edit', 'edit');
        Route::put('product/{product}', 'update');
        Route::get('image/{image}/delete', 'destroyImage');
    });


    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function(){
        Route::get('slider', 'index');
        Route::get('slider/create', 'create');
        Route::post('slider', 'store');
        Route::get('slider/{slider}/edit', 'edit');
        Route::put('slider/{slider}', 'update');
    });


     Route::controller(App\Http\Controllers\Customer\CheckoutController::class)->group(function(){
        // Route::get('orders', 'adminIndex')->name('checkout');
        Route::get('orders', 'adminOrders');
        Route::get('orders/{checkout}', 'showAdminOrder');
        // Route::delete('cart/delete/{cart}', 'destroy');
        
    });
});
