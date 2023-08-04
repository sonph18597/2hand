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
    Route::group(['prefix' => 'menu'], function(){
        Route::get('','AdminMenuController@index')->name('admin.menu.index');
        Route::get('create','AdminMenuController@create')->name('admin.menu.create');
        Route::post('create','AdminMenuController@store');

        Route::get('update/{id}','AdminMenuController@edit')->name('admin.menu.update');
        Route::post('update/{id}','AdminMenuController@update');

        Route::get('active/{id}','AdminMenuController@active')->name('admin.menu.active');
        Route::get('hot/{id}','AdminMenuController@hot')->name('admin.menu.hot');
        Route::get('delete/{id}','AdminMenuController@delete')->name('admin.menu.delete');
    });

    Route::group(['prefix' => 'attribute'], function(){
        Route::get('','AdminAttributeController@index')->name('admin.attribute.index');
        Route::get('create','AdminAttributeController@create')->name('admin.attribute.create');
        Route::post('create','AdminAttributeController@store');

        Route::get('update/{id}','AdminAttributeController@edit')->name('admin.attribute.update');
        Route::post('update/{id}','AdminAttributeController@update');
        Route::get('hot/{id}','AdminAttributeController@hot')->name('admin.attribute.hot');

        Route::get('delete/{id}','AdminAttributeController@delete')->name('admin.attribute.delete');

    });

    Route::group(['prefix' => 'producer'], function(){
        Route::get('','AdminProducerController@index')->name('admin.producer.index');
        Route::get('create','AdminProducerController@create')->name('admin.producer.create');
        Route::post('create','AdminProducerController@store');

        Route::get('update/{id}','AdminProducerController@edit')->name('admin.producer.update');
        Route::post('update/{id}','AdminProducerController@update');

        Route::get('delete/{id}','AdminProducerController@delete')->name('admin.producer.delete');
    });

    Route::group(['prefix' => 'keyword'], function(){
        Route::get('','AdminKeywordController@index')->name('admin.keyword.index');
        Route::get('create','AdminKeywordController@create')->name('admin.keyword.create');
        Route::post('create','AdminKeywordController@store');

    });







});
