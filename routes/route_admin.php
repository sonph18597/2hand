<?php

Route::group(['prefix' => 'laravel-filemanager','middleware' => 'check_admin_login'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['prefix' => 'api-admin','namespace' => 'Admin','middleware' => 'check_admin_login'], function() {
//        Route::get('','AdminController@index')->name('get.admin.index');

    Route::get('profile','AdminProfileController@index')->name('admin.profile.index');
    Route::post('profile/{id}','AdminProfileController@update')->name('admin.profile.update');
    /**
     * Route danh mục sản phẩm
     **/
    Route::group(['prefix' => 'category'], function(){
        Route::get('','AdminCategoryController@index')->name('admin.category.index');
        Route::get('create','AdminCategoryController@create')->name('admin.category.create');
        Route::post('create','AdminCategoryController@store');

        Route::get('update/{id}','AdminCategoryController@edit')->name('admin.category.update');
        Route::post('update/{id}','AdminCategoryController@update');

        Route::get('active/{id}','AdminCategoryController@active')->name('admin.category.active');
        Route::get('hot/{id}','AdminCategoryController@hot')->name('admin.category.hot');
        Route::get('delete/{id}','AdminCategoryController@delete')->name('admin.category.delete');

    });

    Route::group(['prefix' => 'user'], function(){
        Route::get('','AdminUserController@index')->name('admin.user.index');

        Route::get('update/{id}','AdminUserController@edit')->name('admin.user.update');
        Route::post('update/{id}','AdminUserController@update');


        Route::get('delete/{id}','AdminUserController@delete')->name('admin.user.delete');

    });

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










});
