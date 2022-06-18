<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/','login');
Route::get("/login", [\App\Http\Controllers\AuthController::class, 'showLoginForm']);
Route::post("/post-login", [\App\Http\Controllers\AuthController::class, 'loginAction']);
Route::middleware(\App\Http\Middleware\Autentikasi::class)->group(function (){
    Route::get("/admin/dashboard", [App\Http\Controllers\admin\Home::class, 'index']);
});
