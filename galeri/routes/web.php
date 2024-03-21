<?php
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\layout;
use App\Http\Controllers\auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user.index');
// });
Route::get('/', [Layout::class, 'index'])->name('index');

route::controller(layout::class)->group(function(){
    route::get('/admin/tambah_galeri','tambah_galeri')->name('tambah_galeri');
    route::get('/admin/tabel_galeri','tabel_galeri')->name('tabel_galeri');
    route::get('/admin/setelah_login','setelah_login')->name('setelah_login');

});
route::post('/tambahGallery',[GaleriController::class,"store"])->name('simpanGaleri');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registerproses'])->name('register');

route::get('/editgallery/{id}',[GaleriController::class,'edit'])->name('edit');
route::post('/editgallery/{id}',[GaleriController::class,"update"])->name('update');
route::get('/hapus-gallery/{id}',[GaleriController::class,"destroy"])->name('hapus-gallery');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function (){
route::get('/setelah_login',[layout::class,'setelah_login'])->name('setelah_login');
route::get('/tambah_galeri',[layout::class,'tambah_galeri'])->name('tambah_galeri');
route::get('/tabel_galeri',[layout::class,'tabel_galeri'])->name('tabel_galeri');
});