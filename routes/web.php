<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//====== Frontend Route ======//
Route::get('/', 'Frontend\FrontendController@index');
Route::get('contact/us', 'Frontend\FrontendController@contactUs')->name('contact.us');
Route::get('shoping/cart', 'Frontend\FrontendController@shopCart')->name('cart.page');
Route::post('contact', 'Backend\User\ContactController@send_mail')->name('send.mail');
Route::get('product-list', 'Frontend\FrontendController@productList')->name('product.list');
Route::get('category-product/{category_id}', 'Frontend\FrontendController@categoryProduct')->name('category.product');
Route::get('brand-product/{brand_id}', 'Frontend\FrontendController@brandProduct')->name('brand.product');
Route::get('product-details/{slug}', 'Frontend\FrontendController@productDetails')->name('product.details');
Route::post('product/find', 'Frontend\FrontendController@productFind')->name('product.find');
Route::get('get/product', 'Frontend\FrontendController@getProduct')->name('get.product');


Auth::routes();

// Shopping  Cart
Route::post('/add-to-cart', 'Frontend\CartController@addtocart')->name('insert.cart');
Route::get('/show-cart', 'Frontend\CartController@showcart')->name('show.cart');
Route::get('/remove-cart/{id}', 'Frontend\CartController@removecart')->name('remove.cart');
Route::post('/update-cart', 'Frontend\CartController@updatecart')->name('update.cart');

// Customer Auth
Route::get('customer-login', 'Frontend\CheckoutController@customerlogin')->name('customer.login');
Route::get('customer-reg', 'Frontend\CheckoutController@customerreg')->name('customer.reg');
Route::post('signup-store', 'Frontend\CheckoutController@signupstore')->name('signup.store');
Route::post('customer-log', 'Frontend\CheckoutController@signin')->name('customer.signin');
Route::get('email-verify', 'Frontend\CheckoutController@verify')->name('customer.verify');
Route::post('email-store', 'Frontend\CheckoutController@verifystore')->name('verify.store');
Route::get('active-customer', 'Backend\Customer\CustomerController@index')->name('customer.index');
Route::get('draft-customer', 'Backend\Customer\CustomerController@view')->name('draft.view');
Route::get('customer-delete/{id}', 'Backend\Customer\CustomerController@draftdelete')->name('customer.destroy');
Route::get('checkout', 'Frontend\CheckoutController@checkout')->name('checkout.index');
Route::post('checkout-store', 'Frontend\CheckoutController@checkOutStore')->name('checkout.store');
 
//====== Customer Dashboard ======//
Route::group(['middleware' => ['auth','customer']], function () {
    Route::get('/dashboard', 'Frontend\DashboardController@dashboard')->name('dashboard');
    Route::get('/my-profile', 'Frontend\DashboardController@customerprofile')->name('customer.profile');
    Route::get('my-profile-edit', 'Frontend\DashboardController@customerProfileEdit')->name('my.profile.edit');
    Route::post('my-profile-update', 'Frontend\DashboardController@myProfileUpdate')->name('my.profile.update');
    Route::get('change-password', 'Frontend\DashboardController@customerPassChange')->name('customer.pass.change');
    Route::post('my-password-change', 'Frontend\DashboardController@myPassChange')->name('my.password.change');
    Route::get('customer/payment', 'Frontend\CheckoutController@payment')->name('customer.payment');
    Route::post('payment/store', 'Frontend\CheckoutController@paymentStore')->name('payment.store');
    Route::get('customer/order', 'Frontend\DashboardController@orderList')->name('order.list');
    Route::post('order/details/{id}', 'Frontend\DashboardController@orderDetails')->name('order.details');
    Route::get('order/print/{id}', 'Frontend\DashboardController@orderprint')->name('order.print');
});

// Order Route
Route::prefix('order')->group(function(){
    Route::get('pending/list', 'Backend\Order\OrderController@orderPending')->name('order.pending');
    Route::get('approved/list', 'Backend\Order\OrderController@orderApproved')->name('order.approved');
    Route::get('product/details/{id}', 'Backend\Order\OrderController@details')->name('details.order');
    Route::post('approved/{id}', 'Backend\Order\OrderController@approved')->name('approve.order');
});

//====== Backend Route ======//
Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'home/','middleware' => 'auth'], function(){
    Route::resource('user', 'Backend\User\UserController');
    Route::resource('profile', 'Backend\User\ProfileController');
    Route::get('change/password/', 'Backend\User\ProfileController@password')->name('change.password');
    Route::post('password/', 'Backend\User\ProfileController@change')->name('password');
    Route::get('contact', 'Backend\User\ContactController@view')->name('contact.view');
    Route::get('contact/view/{id}', 'Backend\User\ContactController@send')->name('contact.send');
    Route::get('contact/delete/{id}', 'Backend\User\ContactController@delete')->name('contact.delete');
    Route::get('setting', 'Backend\User\SettingController@index')->name('setting');
    Route::post('setting/store', 'Backend\User\SettingController@store')->name('setting.store');
    Route::resource('category', 'Backend\Category\CategoryController');
    Route::resource('brand', 'Backend\Brand\BrandController');
    Route::resource('product/color', 'Backend\Product\ColorController');
    Route::resource('product/size', 'Backend\Product\SizeController');
    Route::resource('product', 'Backend\Product\ProductController');
    Route::resource('slider', 'Backend\Slider\SliderController');
    Route::get('slider/pending/{id}', 'Backend\Slider\SliderController@pending')->name('slider.pending');
    Route::get('slider/approved/{id}', 'Backend\Slider\SliderController@approved')->name('slider.approved');
});

