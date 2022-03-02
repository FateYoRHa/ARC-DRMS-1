<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

Route::resource('records', App\Http\Controllers\RecordsController::class);

Route::get('change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'index']);
Route::post('change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'store'])->name('change.password');

/**
 * Route adminUpload.
 * Allows the admin and uploader to use the route
 */
Route::group(['middleware' => 'adminUpload'], function () {
    Route::resource('uploads', App\Http\Controllers\UploadsController::class);
    Route::get('records/{record}/edit', [App\Http\Controllers\RecordsController::class, 'edit']);
    
});

/**
 * Route Group Admin.
 * Restricts Pages for Admin
 */
Route::group(['middleware' => 'admin'], function () {
    Route::post('file-import', [App\Http\Controllers\ImportController::class, 'fileImport'])->name('file-import');
    Route::get('file-export', [App\Http\Controllers\ImportController::class, 'fileExport'])->name('file-export');
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    /**
     * Prevent-Back-History.
     * Prevents return to auth pages when logged out
     */
    Route::group(['middleware' => 'prevent-back-history'], function () {
        Route::resource('newrecords', App\Http\Controllers\NewRecordsController::class);
        Route::resource('import', App\Http\Controllers\ImportController::class);
        Route::resource('users', App\Http\Controllers\UserController::class);
    });
});



//DocumentViewer Library
Route::any('ViewerJS/{all?}', function () {
    return View::make('ViewerJS.index');
});
