<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('post', 'PostCrudController');
    CRUD::resource('custom_user', 'CustomUserCrudController');
    CRUD::resource('district', 'DistrictCrudController');
    CRUD::resource('province', 'ProvinceCrudController');
    CRUD::resource('organization', 'OrganizationCrudController');
    CRUD::resource('message', 'MessageCrudController');
    CRUD::resource('content', 'ContentCrudController');
}); // this should be the absolute last line of this file
