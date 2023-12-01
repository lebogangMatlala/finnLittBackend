<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
});

Route::get('/user-privacy-policy', function () {
    return view('user-privacy-policy');
});

Route::get('/contact', function () {
    return view('contact-us');
});





//Post Route

Route::post('/contact', function () {
    $data = request(['name', 'email', 'subject', 'message']);

    \Illuminate\support\Facades\Mail::to(users: 'joshuaratau@gmail.com')
        ->send(new \App\Maail\ContactMe($data));

    return redirect('contact-us');
});

//forgot

Route::group(['middleware' => ['web']], function () {
    // Your routes here
    Route::post('password/reset/{token}', [AuthController::class, 'resetPassword']);
    Route::get('password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::get('/success-page', [AuthController::class, 'successPage']);
});
//Route::post('password/reset/{token}', [AuthController::class, 'resetPassword']);
// Route::get('password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
