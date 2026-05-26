<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Stock;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('stocks')->name('stocks.')->group(function () {
    Route::get('/', [StockController::class, 'index'])->name('index');
    Route::get('/{stock}', [StockController::class, 'show'])->name('show');
    Route::post('/{stock}/watchlist', [StockController::class, 'toggleWatchlist'])->name('watchlist.toggle');
    Route::post('/{stock}/buy', [StockController::class, 'buy'])->name('buy');
});

Route::get('/stocks/{stock}/data', function (Stock $stock) {
    return response()->json([
        'price' => $stock->price,
        'symbol' => $stock->symbol,
        'company' => $stock->company_name,
    ]);
})->name('stocks.data');

Route::get('/investments', [InvestmentController::class, 'index'])->name('investments.index');
Route::post('/investments', [InvestmentController::class, 'store'])->name('investments.store');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
