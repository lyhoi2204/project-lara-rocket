<?php

Route::group(['prefix' => 'api', 'as' => 'api.', 'namespace' => 'Api'], function() {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function() {
        Route::group(['middleware' => ['admin.auth']], function() {
            Route::get('information', 'IndexController@information');
            Route::get('me', 'MeController@show');
            Route::put('me', 'MeController@update');
            Route::post('sign-out', 'AuthController@postSignOut');

            Route::resource('admin-users', 'AdminUserController')->only([
                'index', 'show', 'store', 'update', 'destroy',
            ]);
            Route::resource('users', 'UserController')->only([
                'index', 'show', 'store', 'update', 'destroy',
            ]);
            Route::resource('files', 'FileController')->only([
                'index', 'show', 'store', 'update', 'destroy',
            ]);
            Route::resource('admin_user_roles', 'AdminUserRoleController')->only([
                'index', 'show', 'store', 'update', 'destroy',
            ]);
            Route::resource('admin_user_notifications', 'AdminUserNotificationController')->only([
                'index', 'show', 'store', 'update', 'destroy',
            ]);
            Route::resource('user_service_authentications', 'UserServiceAuthenticationController')->only([
                'index', 'show', 'store', 'update', 'destroy',
            ]);
        });
    });
});
