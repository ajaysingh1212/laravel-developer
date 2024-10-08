<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Product Category
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tag
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Product
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController', ['except' => ['store']]);

    // User Alerts
    Route::apiResource('user-alerts', 'UserAlertsApiController', ['except' => ['update']]);

    // Asset Category
    Route::apiResource('asset-categories', 'AssetCategoryApiController');

    // Asset Location
    Route::apiResource('asset-locations', 'AssetLocationApiController');

    // Asset Status
    Route::apiResource('asset-statuses', 'AssetStatusApiController');

    // Asset
    Route::post('assets/media', 'AssetApiController@storeMedia')->name('assets.storeMedia');
    Route::apiResource('assets', 'AssetApiController');

    // Assets History
    Route::apiResource('assets-histories', 'AssetsHistoryApiController', ['except' => ['store', 'update', 'destroy']]);

    // Expense Category
    Route::apiResource('expense-categories', 'ExpenseCategoryApiController');

    // Income Category
    Route::apiResource('income-categories', 'IncomeCategoryApiController');

    // Expense
    Route::apiResource('expenses', 'ExpenseApiController');

    // Income
    Route::apiResource('incomes', 'IncomeApiController');

    // Contact Company
    Route::apiResource('contact-companies', 'ContactCompanyApiController');

    // Contact Contacts
    Route::apiResource('contact-contacts', 'ContactContactsApiController');

    // View Order
    Route::apiResource('view-orders', 'ViewOrderApiController', ['except' => ['store']]);

    // Color
    Route::apiResource('colors', 'ColorApiController');

    // Brand
    Route::apiResource('brands', 'BrandApiController');

    // Update Order
    Route::post('update-orders/media', 'UpdateOrderApiController@storeMedia')->name('update-orders.storeMedia');
    Route::apiResource('update-orders', 'UpdateOrderApiController');

    // Shipment
    Route::apiResource('shipments', 'ShipmentApiController');

    // Manage Returns Refunds
    Route::apiResource('manage-returns-refunds', 'ManageReturnsRefundsApiController');

    // Stocks
    Route::apiResource('stocks', 'StocksApiController');

    // Product Review
    Route::post('product-reviews/media', 'ProductReviewApiController@storeMedia')->name('product-reviews.storeMedia');
    Route::apiResource('product-reviews', 'ProductReviewApiController');

    // Queries
    Route::post('queries/media', 'QueriesApiController@storeMedia')->name('queries.storeMedia');
    Route::apiResource('queries', 'QueriesApiController');

    // Coupons
    Route::post('coupons/media', 'CouponsApiController@storeMedia')->name('coupons.storeMedia');
    Route::apiResource('coupons', 'CouponsApiController');

    // Featured Products
    Route::post('featured-products/media', 'FeaturedProductsApiController@storeMedia')->name('featured-products.storeMedia');
    Route::apiResource('featured-products', 'FeaturedProductsApiController');

    // Websetting
    Route::post('websettings/media', 'WebsettingApiController@storeMedia')->name('websettings.storeMedia');
    Route::apiResource('websettings', 'WebsettingApiController');

    // Master
    Route::apiResource('masters', 'MasterApiController');
});
