<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => 'api',
], function () {
    // Define your API routes here
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('showuser/{id}', [AuthController::class, 'show']);
    Route::post('sendfeedback', [AuthController::class, 'sendFeedback']);
    Route::get('send-mail', [AuthController::class, 'index']);
    Route::put('updateuser/{id}', [AuthController::class, 'update']);
    Route::delete('deleteuser/{id}', [AuthController::class, 'destroy']);
    Route::post('/forgotPassword', [AuthController::class, 'sendResetLinkEmail']);
    //Route::post('/reset-password', ResetPasswordController::class, 'reset');
    // Send reset link email
    Route::post('/password/reset/send', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.reset');

    // Reset password
    Route::post('/password/reset', [ResetPasswordController::class, 'reset']);

});


Route::middleware('auth:sanctum')->
get('/user', function (Request $request) {
    return $request->user();
});
