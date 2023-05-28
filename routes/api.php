<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BTCApiController;

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

Route::get('/rate', function () {
    return response()->json(BTCApiController::getRate());
});

Route::post('/subscribe', function (Request $request) {
    return response()->json(BTCApiController::subscribe($request));
});

Route::post('/sendEmails', function () {
    return response()->json(BTCApiController::sendEmails());
});

/*
TESTING
*/

Route::get('/getEmails', function () {
    return response()->json(BTCApiController::getEmails());
});

Route::post('/dropEmails', function () {
    return response()->json(BTCApiController::dropEmails());
});

/*
Fallback
*/

Route::fallback(function () {
    return response()->json([
        "message" => "Route not supported",
    ], 404);
});
