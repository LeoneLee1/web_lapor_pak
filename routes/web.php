<?php

use App\Models\User;
use App\Models\Laporan;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProgressController;


Route::get('/', function (){
    return view('welcome');
});

Route::middleware(['auth','admin'])->group(function (){

    Route::get('/admin', function () {

        $kategori = Category::count();
        $laporan = Laporan::count();
        $masyarakat = User::count();

        return view('admin.dashboard',compact('kategori','laporan','masyarakat'));
    })->name('admin');
    
    // Route DATA MASYARAKAT (USER CONTROLLER)
    Route::prefix('data_masyarakat')->group(function (){
        Route::get('/',[UserController::class,'data_masyarakat'])->name('data_masyarakat');
        Route::get('/json',[UserController::class,'data_masyarakat_json'])->name('data_masyarakat.json');
        Route::get('/create',[UserController::class,'create'])->name('data_masyarakat.create');
        Route::post('/create/insert',[UserController::class,'insert'])->name('data_masyarakat.insert');
        Route::get('/show/{id}',[UserController::class,'show'])->name('data_masyarakat.show');
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('data_masyarakat.edit');
        Route::post('/edit/update/{id}',[UserController::class,'update'])->name('data_masyarakat.update');
        Route::delete('/delete/{id}',[UserController::class,'delete'])->name('data_masyarakat.delete');
    });

    // Route DATA KATEGORI (CategoryController)
    Route::prefix('data_kategori_laporan')->group(function (){
        Route::get('/json',[CategoryController::class,'data_kategori_laporan_json'])->name('data_kategori_laporan.json');
        Route::get('/',[CategoryController::class,'data_kategori_laporan'])->name('data_kategori_laporan');
        Route::get('/create',[CategoryController::class,'create'])->name('data_kategori_laporan.create');
        Route::post('/create/insert',[CategoryController::class,'insert'])->name('data_kategori_laporan.insert');
        Route::get('/show/{id}',[CategoryController::class,'show'])->name('data_kategori_laporan.show');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('data_kategori_laporan.edit');
        Route::post('/edit/update/{id}',[CategoryController::class,'update'])->name('data_kategori_laporan.update');
        Route::delete('/delete/{id}',[CategoryController::class,'delete'])->name('data_kategori_laporan.delete');
    });

    // Route DATA LAPORAN (LaporanController)
    Route::prefix('data_laporan')->group(function (){
        Route::get('/json',[LaporanController::class,'data_laporan_json'])->name('data_laporan.json');
        Route::get('/',[LaporanController::class,'data_laporan'])->name('data_laporan');
        Route::get('/create',[LaporanController::class,'create'])->name('data_laporan.create');
        Route::post('/create/insert',[LaporanController::class,'insert'])->name('data_laporan.insert');
        Route::get('/show/{id}',[LaporanController::class,'show'])->name('data_laporan.show');
        Route::get('/edit/{id}',[LaporanController::class,'edit'])->name('data_laporan.edit');
        Route::post('/edit/update/{id}',[LaporanController::class,'update'])->name('data_laporan.update');
        Route::delete('/delete/{id}',[LaporanController::class,'delete'])->name('data_laporan.delete');
    });

    // Route PROGRESS LAPORAN (ProgressController)
    Route::prefix('progress')->group(function () {
        Route::get('/json/{id}',[ProgressController::class,'progress_json'])->name('progress.json');
        Route::get('/create/{kode}',[ProgressController::class,'create'])->name('progress.create');
        Route::post('/create/insert',[ProgressController::class,'insert'])->name('progress.insert');
        Route::get('/edit/{id}',[ProgressController::class,'edit'])->name('progress.edit');
        Route::post('/edit/update/{id}',[ProgressController::class,'update'])->name('progress.update');
        Route::delete('/delete/{id}',[ProgressController::class,'delete'])->name('progress.delete');
    });
});

// Route Auth (AUTH CONTROLLER)
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login/proses',[AuthController::class,'login'])->name('login.proses');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register/proses',[AuthController::class,'register_process'])->name('register.proses');
Route::get('/forgot_password',[AuthController::class,'forgot_password'])->name('forgot_password');
Route::post('/forgot_password/proses',[AuthController::class,'forgot_password_process'])->name('forgot_password.proses');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


