<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace' => 'Auth','prefix' => 'account'], function(){
    Route::get('register','RegisterController@getFormRegister')->name('get.register');
    Route::post('register','RegisterController@postRegister');

    Route::get('login','LoginController@getFormLogin')->name('get.login');
    Route::post('login','LoginController@postLogin');

    Route::get('logout','LoginController@getLogout')->name('get.logout');
    Route::get('reset-password','ResetPasswordController@getEmailReset')->name('get.email_reset_password');
    Route::post('reset-password','ResetPasswordController@checkEmailResetPassword');

    Route::get('new-password','ResetPasswordController@newPassword')->name('get.new_password');
    Route::post('new-password','ResetPasswordController@savePassword');

    Route::get('/{social}/redirect', 'SocialAuthController@redirect')->name('get.login.social');
    Route::get('/{social}/callback', 'SocialAuthController@callback')->name('get.login.social_callback');
});

Route::group(['prefix' => 'api-admin','namespace' => 'Admin','middleware' => 'check_admin_login'], function() {
    Route::group(['prefix' => 'product'], function(){
        Route::get('','AdminProductController@index')->name('admin.product.index');
        Route::get('create','AdminProductController@create')->name('admin.product.create');
        Route::post('create','AdminProductController@store');

        Route::get('hot/{id}','AdminProductController@hot')->name('admin.product.hot');
        Route::get('active/{id}','AdminProductController@active')->name('admin.product.active');
        Route::get('update/{id}','AdminProductController@edit')->name('admin.product.update');
        Route::post('update/{id}','AdminProductController@update');

        Route::get('delete/{id}','AdminProductController@delete')->name('admin.product.delete');
        Route::get('delete-image/{id}','AdminProductController@deleteImage')->name('admin.product.delete_image');
    });

    Route::group(['prefix' => 'transaction'], function(){
        Route::get('','AdminTransactionController@index')->name('admin.transaction.index');
        Route::get('delete/{id}','AdminTransactionController@delete')->name('admin.transaction.delete');
        Route::get('order-delete/{id}','AdminTransactionController@deleteOrderItem')->name('ajax_admin.transaction.order_item');
        Route::get('view-transaction/{id}','AdminTransactionController@getTransactionDetail')->name('ajax.admin.transaction.detail');
        Route::get('action/{action}/{id}','AdminTransactionController@getAction')->name('admin.action.transaction');
    });
});

Route::group(['namespace' => 'Frontend'], function() {
    Route::get('/','HomeController@index')->name('get.home');
    Route::get('san-pham','ProductController@index')->name('get.product.list');
    Route::get('danh-muc/{slug}','CategoryController@index')->name('get.category.list');
    Route::get('san-pham/{slug}','ProductDetailController@getProductDetail')->name('get.product.detail');
    Route::get('san-pham/{slug}/danh-gia','ProductDetailController@getListRatingProduct')->name('get.product.rating_list');
});
