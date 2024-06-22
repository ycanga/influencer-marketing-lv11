<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/campaigns/purchase/success', [App\Http\Controllers\Api\CampaignController::class, 'purchase'])->name('api.campaign.purchase')->middleware('api.token.control');

// Weekly Report
Route::get('/{userId}/weekly-report/{date?}', [App\Http\Controllers\HomeController::class, 'weeklyRevenue'])->name('weekly.get');