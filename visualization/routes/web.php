<?php

Route::redirect('/', '/guest');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::resource('clusterQCs', 'ClusterQCController');

    Route::delete('clusterQCs/destroy', 'ClusterQCController@massDestroy')->name('clusterQCs.massDestroy');

    Route::resource('patients', 'PatientsController');

    Route::delete('patients/destroy', 'PatientsController@massDestroy')->name('patients.massDestroy');

    Route::resource('predictions', 'PredictionsController');

    Route::delete('predictions/destroy', 'PredictionsController@massDestroy')->name('predictions.massDestroy');

});

Route::group(['prefix' => 'guest', 'as' => 'guest.', 'namespace' => 'Guest', 'middleware' => []], function () {

    Route::get('/','HomeController@index')->name('home');
});
