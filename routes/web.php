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
Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('file-import', [App\Http\Controllers\ImportController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [App\Http\Controllers\ImportController::class, 'fileExport'])->name('file-export');


//DocumentViewer Library
Route::any('ViewerJS/{all?}', function(){
    return View::make('ViewerJS.index');
});

Route::group(['middleware' => 'prevent-back-history'],function(){

    Route::resource('records', App\Http\Controllers\RecordsController::class);
    Route::resource('newrecords', App\Http\Controllers\NewRecordsController::class);
    Route::resource('import', App\Http\Controllers\ImportController::class);
    Route::resource('uploads', App\Http\Controllers\UploadsController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
});