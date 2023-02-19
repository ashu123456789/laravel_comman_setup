<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

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

Route::get('/', function () {
    return view('admin.welcome');
});
Auth::routes();
// Route::get('/login', [App\Http\Controllers\LoginController::class, 'showLoginForm']);

Route::get('/send-mail', [App\Http\Controllers\MailSend::class, 'mailsend'])->name('send-mail');
// Route::get('send-mail','MailSend@mailsend');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/test', function () {
        return view('admin.layout.sidemenu');
    });
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('home', App\Http\Controllers\HomeController::class);

    //Category Manager
    Route::get('/categories/status/{id}/{status}', 'App\Http\Controllers\CategoryController@status');
    Route::resource('categories', App\Http\Controllers\CategoryController::class);

    //Sub-Category Manager
    Route::get('/sub_categories/status/{id}/{status}', 'App\Http\Controllers\SubCategoryController@status');
    Route::resource('sub_categories', App\Http\Controllers\SubCategoryController::class);
});


Route::group(['prefix' => 'api', 'namespace' => 'Api\V1\Auth', 'middleware' => ['api']], function () {

    Route::post('/login',  [AuthController::class, 'login']);
    Route::post('/register',  [AuthController::class, 'register']);

    Route::group(['middleware' => ['jwt.verify']], function () {
        Route::get('/users',  [UserController::class, 'getUsers']);
        Route::put('/editUser',  [UserController::class, 'update']);
        Route::delete('/deleteUser',  [UserController::class, 'delete']);
        Route::get('/logout',  [AuthController::class, 'logout']);
    });
});
