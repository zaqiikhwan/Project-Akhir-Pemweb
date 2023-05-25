<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Models\News;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', [NewsController::class, 'read']);
// Route::post('/create-news', [NewsController::class, 'createNews']);

// Route::view('/test', 'create');

Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload']);
Route::get('/upload/hapus/{id}', [UploadController::class, 'delete']);
Route::get('/upload/edit/{id}', [UploadController::class, 'editNews']);
Route::patch('/upload/update', [UploadController::class, 'edit']);


Route::prefix('admin')->group(function(){
    Route::get('/',[LoginController::class, 'loginForm']);
    Route::get('/login',[LoginController::class, 'loginForm'])->name('admin.login');
});



