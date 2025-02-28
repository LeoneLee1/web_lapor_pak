<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin');


// Route DATA MASYARAKAT (USER CONTROLLER)
Route::get('/data_masyarakat',[UserController::class,'data_masyarakat'])->name('data_masyarakat');
Route::get('/data_masyarakat/json',[UserController::class,'data_masyarakat_json'])->name('data_masyarakat.json');
Route::get('/data_masyarakat/create',[UserController::class,'create'])->name('data_masyarakat.create');
Route::post('/data_masyarakat/create/insert',[UserController::class,'insert'])->name('data_masyarakat.insert');
Route::get('/data_masyarakat/show/{id}',[UserController::class,'show'])->name('data_masyarakat.show');
Route::get('/data_masyarakat/edit/{id}',[UserController::class,'edit'])->name('data_masyarakat.edit');
Route::post('/data_masyarakat/edit/update/{id}',[UserController::class,'update'])->name('data_masyarakat.update');
Route::delete('/data_masyarakat/delete/{id}',[UserController::class,'delete'])->name('data_masyarakat.delete');

