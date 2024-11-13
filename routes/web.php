<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

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
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController', ['except' => ['create', 'store']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Asset Category
    Route::delete('asset-categories/destroy', 'AssetCategoryController@massDestroy')->name('asset-categories.massDestroy');
    Route::resource('asset-categories', 'AssetCategoryController');

    // Asset Location
    Route::delete('asset-locations/destroy', 'AssetLocationController@massDestroy')->name('asset-locations.massDestroy');
    Route::resource('asset-locations', 'AssetLocationController');

    // Asset Status
    Route::delete('asset-statuses/destroy', 'AssetStatusController@massDestroy')->name('asset-statuses.massDestroy');
    Route::resource('asset-statuses', 'AssetStatusController');

    // Asset
    Route::delete('assets/destroy', 'AssetController@massDestroy')->name('assets.massDestroy');
    Route::post('assets/media', 'AssetController@storeMedia')->name('assets.storeMedia');
    Route::post('assets/ckmedia', 'AssetController@storeCKEditorImages')->name('assets.storeCKEditorImages');
    Route::resource('assets', 'AssetController');

    // Assets History
    Route::resource('assets-histories', 'AssetsHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expense Report
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    // Contact Company
    Route::delete('contact-companies/destroy', 'ContactCompanyController@massDestroy')->name('contact-companies.massDestroy');
    Route::resource('contact-companies', 'ContactCompanyController');

    // Contact Contacts
    Route::delete('contact-contacts/destroy', 'ContactContactsController@massDestroy')->name('contact-contacts.massDestroy');
    Route::resource('contact-contacts', 'ContactContactsController');

    // View Order
    Route::delete('view-orders/destroy', 'ViewOrderController@massDestroy')->name('view-orders.massDestroy');
    Route::resource('view-orders', 'ViewOrderController', ['except' => ['create', 'store']]);

    // Color
    Route::delete('colors/destroy', 'ColorController@massDestroy')->name('colors.massDestroy');
    Route::resource('colors', 'ColorController');

    // Brand
    Route::delete('brands/destroy', 'BrandController@massDestroy')->name('brands.massDestroy');
    Route::resource('brands', 'BrandController');

    // Update Order
    Route::delete('update-orders/destroy', 'UpdateOrderController@massDestroy')->name('update-orders.massDestroy');
    Route::post('update-orders/media', 'UpdateOrderController@storeMedia')->name('update-orders.storeMedia');
    Route::post('update-orders/ckmedia', 'UpdateOrderController@storeCKEditorImages')->name('update-orders.storeCKEditorImages');
    Route::resource('update-orders', 'UpdateOrderController');

    // Shipment
    Route::delete('shipments/destroy', 'ShipmentController@massDestroy')->name('shipments.massDestroy');
    Route::resource('shipments', 'ShipmentController');

    // Manage Returns Refunds
    Route::delete('manage-returns-refunds/destroy', 'ManageReturnsRefundsController@massDestroy')->name('manage-returns-refunds.massDestroy');
    Route::resource('manage-returns-refunds', 'ManageReturnsRefundsController');

    // Stocks
    Route::delete('stocks/destroy', 'StocksController@massDestroy')->name('stocks.massDestroy');
    Route::resource('stocks', 'StocksController');

    // Product Review
    Route::delete('product-reviews/destroy', 'ProductReviewController@massDestroy')->name('product-reviews.massDestroy');
    Route::post('product-reviews/media', 'ProductReviewController@storeMedia')->name('product-reviews.storeMedia');
    Route::post('product-reviews/ckmedia', 'ProductReviewController@storeCKEditorImages')->name('product-reviews.storeCKEditorImages');
    Route::resource('product-reviews', 'ProductReviewController');

    // Queries
    Route::delete('queries/destroy', 'QueriesController@massDestroy')->name('queries.massDestroy');
    Route::post('queries/media', 'QueriesController@storeMedia')->name('queries.storeMedia');
    Route::post('queries/ckmedia', 'QueriesController@storeCKEditorImages')->name('queries.storeCKEditorImages');
    Route::resource('queries', 'QueriesController');

    // Coupons
    Route::delete('coupons/destroy', 'CouponsController@massDestroy')->name('coupons.massDestroy');
    Route::post('coupons/media', 'CouponsController@storeMedia')->name('coupons.storeMedia');
    Route::post('coupons/ckmedia', 'CouponsController@storeCKEditorImages')->name('coupons.storeCKEditorImages');
    Route::resource('coupons', 'CouponsController');

    // Featured Products
    Route::delete('featured-products/destroy', 'FeaturedProductsController@massDestroy')->name('featured-products.massDestroy');
    Route::post('featured-products/media', 'FeaturedProductsController@storeMedia')->name('featured-products.storeMedia');
    Route::post('featured-products/ckmedia', 'FeaturedProductsController@storeCKEditorImages')->name('featured-products.storeCKEditorImages');
    Route::resource('featured-products', 'FeaturedProductsController');

    // Websetting
    Route::delete('websettings/destroy', 'WebsettingController@massDestroy')->name('websettings.massDestroy');
    Route::post('websettings/media', 'WebsettingController@storeMedia')->name('websettings.storeMedia');
    Route::post('websettings/ckmedia', 'WebsettingController@storeCKEditorImages')->name('websettings.storeCKEditorImages');
    Route::resource('websettings', 'WebsettingController');

    // Master
    Route::delete('masters/destroy', 'MasterController@massDestroy')->name('masters.massDestroy');
    Route::resource('masters', 'MasterController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
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
