<?php

/**
 * Anggaran -> hasMany (Realisasi) | hasMany (Audit)
 * - code
 * - name
 * - biaya
 * - sisa
 * 
 * Realisasi
 * - anggaran_id -> belongsTo
 * - biaya
 * - name
 * - description
 * 
 * Audit
 * - anggaran_id -> belongsTo
 * - biaya
 * - name
 * - description
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'impersonate'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('password.confirm');

    Route::get('impersonate', 'ImpersonateController@index')->name('impersonate.index');
    Route::get('/users/{id}/impersonate', 'ImpersonateController@impersonate')->name('impersonate.impersonate');
    Route::get('/users/stop', 'ImpersonateController@stopImpersonating')->name('impersonate.stop');

    Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
    });

    Route::get('anggaran', 'AnggaranController@index');
    Route::get('anggaran/create', 'AnggaranController@create');
    Route::post('anggaran', 'AnggaranController@store');
});
