<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Middleware\Autentikasi;
use App\Http\Controllers\admin\Home;
use App\Http\Controllers\Admin\Wilayah;

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
Route::get("/login", [AuthController::class, 'showLoginForm'])->name('login');
Route::post("/post-login", [AuthController::class, 'loginAction'])->name('post-login');
Route::middleware(Autentikasi::class)->group(function (){
    Route::get("/admin/dashboard", [Home::class, 'index'])->name('admin.dashboard');
    Route::get("/admin/wartawan", [Home::class, 'index'])->name('admin.wartawan');
    Route::get("/admin/berita", [Home::class, 'index'])->name('admin.berita');
    //route for wilayah
    Route::get("/admin/wilayah", [Wilayah::class, 'index'])->name('admin.wilayah');
    Route::post("/admin/wilayah/add", [Wilayah::class, 'add'])->name('admin.wilayah.add');
    Route::get("/admin/wilayah/delete/{any}", [Wilayah::class, 'delete'])->name('admin.wilayah.delete');



});
Route::get('logout', function (){
   session()->regenerateToken();
   session()->forget('username');
   session()->flash('messages', 'berhasil keluar');
   return redirect('login');
})->name('logout');
