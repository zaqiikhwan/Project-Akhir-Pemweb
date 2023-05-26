<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Profile;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
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
    return view('user.pages.home');
});

Route::get('/profile/{params}', [Profile::class, 'view']);

Route::get('/news', [NewsController::class, 'upload'])->name('upload');
Route::post('/news', [NewsController::class, 'proses_upload'])->middleware('auth');
Route::get('/news/hapus/{id}', [NewsController::class, 'delete'])->middleware('auth');
Route::get('/news/edit/{id}', [NewsController::class, 'editNews'])->middleware('auth');
Route::patch('/news/update', [NewsController::class, 'edit'])->middleware('auth');

Route::get('/admin', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/admin/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');




