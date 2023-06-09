<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\Order;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Midtrans\Transaction;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DikiController;
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

// Homepage Route
Route::controller(Homepage::class)->group(function(){
    Route::get('/','home')->name('Beranda');
    Route::get('/profile/{params}','profile')->name('Profil');
    Route::name('Berita')->group(function(){
        Route::get('/news','news');
        Route::get('/news/{id}','newsdetail');
    });
    Route::name('product')->group(function(){
        Route::get('/product','product');
        Route::get('/product/{id}','productdetail');
        Route::get('/payment/{id}','payment');
    });
});

Route::prefix('admin')->group(function(){
    Route::middleware(['auth'])->group(function(){
        // News Route
        Route::name('news')->group(function(){
            Route::controller(NewsController::class)->group(function(){
                // Route::get('/news', 'index')->name('news.index');
                Route::get('/news', 'upload');
                Route::post('/news', 'proses_upload');
                Route::get('/news/hapus/{id}', 'delete');
                Route::get('/news/edit/{id}',  'editNews');
                Route::patch('/news/update', 'edit');
            });
        });

        // Agenda Route
        Route::name('agenda')->group(function(){
            Route::controller(AgendaController::class) -> group(function(){
                Route::get('/agenda', 'index')->name('agenda.index');
            });
        });

        // Product Route
        Route::name('products')->group(function(){
            Route::get('products', [ProductController::class, 'index'])->name('.index')->middleware('auth');
        });

        Route::get('order',[OrderController::class , 'index'])->name('order');
    });
});

Route::get('orders', [OrderController::class, 'getOrders']);
// Route::get('admin/news', [NewsController::class, 'upload'])->name('news.index');

Route::get('api/payment/test', [PaymentsController::class, 'qrisTransferCharge'])->name("payqris");
Route::post('payment/notification', [NotificationController::class, 'post']);
Route::get('/status/{id}', [NotificationController::class, 'getStatus']);

Route::get('/admin', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::resource('/agenda',AgendaController::class);
Route::get('/admin/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::resource('agendas', AgendaController::class)->middleware('auth');
Route::get('agendas', [AgendaController::class, 'index'])->name('agenda.index')->middleware('auth');

Route::resource('products', ProductController::class)->middleware('auth');

Route::get('/hash', [DikiController::class, 'hash']);
