<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Middleware\Autentikasi;
use App\Http\Controllers\admin\Home;
use App\Http\Controllers\Admin\Wilayah;
use App\Http\Controllers\admin\Wartawan;

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
#redirect
Route::redirect('/','login');
Route::get("/login", [AuthController::class, 'showLoginForm'])->name('login');
Route::post("/post-login", [AuthController::class, 'loginAction'])->name('post-login');
Route::middleware(Autentikasi::class)->group(function (){
    Route::get("/admin/dashboard", [Home::class, 'index'])->name('admin.dashboard');
    //untuk wartawan
    Route::get("/admin/wartawan", [Wartawan::class, 'index'])->name('admin.wartawan');
    Route::post("/admin/wartawan/post_tambah_wartawan" , [Wartawan::class, 'post_tambah_wartawan'])->name('admin.wartawan.post_tambah_wartawan');
    Route::get("/admin/wartawan/delete/{any}", [Wartawan::class, 'delete'])->name('admin.wartawan.delete');
    Route::get("/admin/wartawan/edit/{any}", [Wartawan::class, 'edit'])->name('admin.wartawan.edit');
    Route::get("/admin/berita", [Home::class, 'index'])->name('admin.berita');
    //route for wilayah
    Route::get("/admin/wilayah", [Wilayah::class, 'index'])->name('admin.wilayah');
    Route::post("/admin/wilayah/add", [Wilayah::class, 'add'])->name('admin.wilayah.add');
    Route::get("/admin/wilayah/delete/{any}", [Wilayah::class, 'delete'])->name('admin.wilayah.delete');
});
#route untuk logout
Route::get('logout', function (){
   session()->regenerateToken();
   session()->forget('username');
   session()->flash('messages', 'berhasil keluar');
   return redirect('login');
})->name('logout');
