<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Header
    Route::delete('headers/destroy', 'HeaderController@massDestroy')->name('headers.massDestroy');
    Route::post('headers/media', 'HeaderController@storeMedia')->name('headers.storeMedia');
    Route::post('headers/ckmedia', 'HeaderController@storeCKEditorImages')->name('headers.storeCKEditorImages');
    Route::resource('headers', 'HeaderController');

    // Newproduct
    Route::delete('newproducts/destroy', 'NewproductController@massDestroy')->name('newproducts.massDestroy');
    Route::post('newproducts/media', 'NewproductController@storeMedia')->name('newproducts.storeMedia');
    Route::post('newproducts/ckmedia', 'NewproductController@storeCKEditorImages')->name('newproducts.storeCKEditorImages');
    Route::resource('newproducts', 'NewproductController');

    // Brand
    Route::delete('brands/destroy', 'BrandController@massDestroy')->name('brands.massDestroy');
    Route::resource('brands', 'BrandController');

    // Orderconfrirm
    Route::delete('orderconfrirms/destroy', 'OrderconfrirmController@massDestroy')->name('orderconfrirms.massDestroy');
    Route::resource('orderconfrirms', 'OrderconfrirmController');

    // Addshiping
    Route::delete('addshipings/destroy', 'AddshipingController@massDestroy')->name('addshipings.massDestroy');
    Route::resource('addshipings', 'AddshipingController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
