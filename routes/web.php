<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Payment Data
    Route::get('/payment-data', [App\Http\Controllers\PaymentDataController::class, 'index'])->name('payment.index');
    Route::post('/payment-data', [App\Http\Controllers\PaymentDataController::class, 'store'])->name('payment.store');
    Route::get('/balance-transfer', [App\Http\Controllers\BalanceTransferController::class, 'index'])->name('balance.index');
    Route::post('/balance-transfer', [App\Http\Controllers\BalanceTransferController::class, 'store'])->name('balance.store');

    // Money Demand
    Route::get('/money-demand', [App\Http\Controllers\MoneyDemandController::class, 'index'])->name('demand.index');

    // Support and Help
    Route::get('/support-and-help', [App\Http\Controllers\SupportAndHelpController::class, 'index'])->name('support.index');
    Route::post('/support-and-help', [App\Http\Controllers\SupportAndHelpController::class, 'store'])->name('support.store');
    Route::get('/support-and-help/{id}', [App\Http\Controllers\SupportAndHelpController::class, 'show'])->name('support.show');
    Route::post('/support-and-help/reply/{id}', [App\Http\Controllers\SupportAndHelpController::class, 'reply'])->name('support.reply');
    Route::get('/support-and-help/close/{id}', [App\Http\Controllers\SupportAndHelpController::class, 'close'])->name('support.close');

    // Money Demand
    Route::post('/money-demand', [App\Http\Controllers\MoneyDemandController::class, 'store'])->name('demand.store');
});

// General Routes
Route::post('/return', [App\Http\Controllers\BalanceTransferController::class, 'return'])->name('balance.return');

// Referance Routes
Route::get('/ref/{key}/{campaign}', [App\Http\Controllers\ReferanceController::class, 'index'])->name('referance.index');

// Admin Routes
Route::middleware(['auth', 'role.control'])->group(function () {
    // Balance Transfer
    Route::get('/balance-transfer/all', [App\Http\Controllers\Admin\BalanceTransferController::class, 'index'])->name('admin.balance.index');
    Route::get('/balance-transger/approve/{id}', [App\Http\Controllers\Admin\BalanceTransferController::class, 'approve'])->name('admin.balance.approve');
    Route::get('/balance-transger/reject/{id}', [App\Http\Controllers\Admin\BalanceTransferController::class, 'reject'])->name('admin.balance.reject');

    // Money Demand
    Route::get('/money-demand/reject/{id}', [App\Http\Controllers\Admin\MoneyDemandController::class, 'reject'])->name('admin.demand.reject');
    Route::get('/money-demand/approve/{id}', [App\Http\Controllers\Admin\MoneyDemandController::class, 'approve'])->name('admin.demand.approve');
});

// Merchant Routes
Route::middleware(['auth', 'merchant.control'])->group(function () {
    // Campaigns
    Route::get('/campaigns', [App\Http\Controllers\CampaignController::class, 'index'])->name('merchant.campaign.index');
});

// User Routes
Route::middleware(['auth', 'user.control'])->group(function () {
    // Campaigns
    // Route::get('/campaigns', [App\Http\Controllers\CampaignController::class, 'index'])->name('user.campaign.index');
    Route::get('/campaigns/{id}/subscribe', [App\Http\Controllers\CampaignController::class, 'subscribe'])->name('user.campaign.subscribe');
});