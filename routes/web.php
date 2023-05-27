<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AgendaController;
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

Route::prefix('admin')->group(function(){
    // News Route
    Route::name('news')->group(function(){
        Route::controller(NewsController::class)->group(function(){
            Route::middleware(['auth'])->group(function(){
                Route::get('/news', 'upload');
                Route::post('/news', 'proses_upload');
                Route::get('/news/hapus/{id}', 'delete');
                Route::get('/news/edit/{id}',  'editNews');
                Route::patch('/news/update', 'edit');
            });
        });
    });
});

Route::get('/admin', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/admin/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::resource('agendas', AgendaController::class);
Route::get('agendas', [AgendaController::class, 'index'])->name('agenda.index');



