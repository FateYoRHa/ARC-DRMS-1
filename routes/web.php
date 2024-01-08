<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
// use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Facades\DataTables;
// use DataTables;
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

//COURSE

// Route::get('courses/{courseID}', App\Http\Controllers\CoursesController::class,'show')->name('course');
// Route::get('courses/{courseID}', function () {
//     return view('courses.course');
// })->name('course');

// DEPARTMENT STUFF

Route::resource('records', App\Http\Controllers\RecordsController::class);
// STUDENT STUFF


// Route::get('/student/{id}',[
//     'uses' => App\Http\Controllers\StudentsController::class,
//     'as' =

// ])->name('updateStatus');

//REGISTRATION stuff
Route::resource('registration', App\Http\Controllers\StudentRegistrationController::class);
Route::get('registration-form', [App\Http\Controllers\StudentRegistrationController::class, 'form'])->name('registration-form');
Route::get('registration.consent', [App\Http\Controllers\StudentRegistrationController::class, 'consent'])->name('consent');
Route::post('register-student', [App\Http\Controllers\StudentRegistrationController::class, 'store'])->name('register-student');
Route::get('register_form', [App\Http\Controllers\StudentRegistrationController::class, 'register_form'])->name('form');
Route::resource('students', App\Http\Controllers\StudentsController::class);

Route::get('change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'index']);
Route::post('change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'store'])->name('change.password');

/**
 * Route adminUpload.
 * Allows the admin and uploader to use the route
 */
Route::group(['middleware' => 'adminUpload'], function () {
    Route::resource('uploads', App\Http\Controllers\UploadsController::class);
    Route::get('records/{record}/edit', [App\Http\Controllers\RecordsController::class, 'edit']);
    // Route::get('students/{student}/edit', [App\Http\Controllers\StudentsController::class, 'edit']);
});

/**
 * Route Group Admin.
 * Restricts Pages for Admin
 */
Route::group(['middleware' => 'admin','prevent-back-history'], function () {
    Route::post('file-import', [App\Http\Controllers\ImportController::class, 'fileImport'])->name('file-import');
    Route::get('file-export', [App\Http\Controllers\ImportController::class, 'fileExport'])->name('file-export');
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::get('/students/update-status/{registration_id}', [App\Http\Controllers\StudentsController::class, 'updateStatus'])->name('update-status');
    Route::get('/students/update-status-drop/{registration_id}', [App\Http\Controllers\StudentsController::class, 'updateStatusDrop'])->name('update-status-drop');
    Route::post('/students/add-student-id/{registration_id}', [App\Http\Controllers\StudentsController::class, 'addStudentId'])->name('add-student-id');
    // Route::get('/students/grade_request/{registration_id}', [App\Http\Controllers\StudentsController::class, 'generateGradePDF'])->name('request-grades');
    Route::get('/students/grade_request/{registration_id}', [App\Http\Controllers\StudentsController::class, 'generateGradePDF'])->name('request-grades');
    Route::get('/students/grade_recieved/{registration_id}', [App\Http\Controllers\StudentsController::class, 'recievedGrade'])->name('recieved-grades');
    Route::get('header', [App\Http\Controllers\StudentsController::class, 'header'])->name('pdfHeader');
    Route::resource('departments', App\Http\Controllers\DepartmentsController::class);
    Route::resource('students', App\Http\Controllers\StudentsController::class);
    Route::resource('courses', App\Http\Controllers\CoursesController::class);
    /**
     * Prevent-Back-History.
     * Prevents return to auth pages when logged out
     */
    Route::group(['middleware' => 'prevent-back-history'], function () {
        Auth::routes();
        Route::resource('newrecords', App\Http\Controllers\NewRecordsController::class);
        Route::resource('import', App\Http\Controllers\ImportController::class);
        Route::resource('users', App\Http\Controllers\UserController::class);
        Route::resource('registration', App\Http\Controllers\StudentRegistrationController::class);
        Route::resource('students', App\Http\Controllers\StudentsController::class);
        Route::get('/students/update-status/{registration_id}', [App\Http\Controllers\StudentsController::class, 'updateStatus'])->name('update-status');
        Route::get('/students/update-status-drop/{registration_id}', [App\Http\Controllers\StudentsController::class, 'updateStatusDrop'])->name('update-status-drop');
        Route::get('/students/add-student-id/{registration_id}', [App\Http\Controllers\StudentsController::class, 'addStudentId'])->name('add-student-id');
    });
});

Route::group(['middleware' => 'dean','prevent-back-history'], function () {
    Route::get('/students/update-status/{registration_id}', [App\Http\Controllers\StudentsController::class, 'updateStatus'])->name('update-status');
    Route::get('/students/update-status-drop/{registration_id}', [App\Http\Controllers\StudentsController::class, 'updateStatusDrop'])->name('update-status-drop');
    /**
     * Prevent-Back-History.
     * Prevents return to auth pages when logged out
     */
    Route::group(['middleware' => 'prevent-back-history'], function () {
        Route::resource('registration', App\Http\Controllers\StudentRegistrationController::class);
        Route::resource('students', App\Http\Controllers\StudentsController::class);
    });
});
Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::resource('registration', App\Http\Controllers\StudentRegistrationController::class);
    Route::get('registration-form', [App\Http\Controllers\StudentRegistrationController::class, 'form'])->name('registration-form');
    // Route::get('/records',[App\Http\Controllers\RecordsController::class,'index'])->name('records');
});

//DocumentViewer Library
Route::any('ViewerJS/{all?}', function () {
    return View::make('ViewerJS.index');
});
