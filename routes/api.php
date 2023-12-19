<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RecruitmentController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:sanctum')->group(function () {
    route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
});

Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::post('/posts', 'store');
    Route::get('/posts/{id}', 'show');
    Route::put('/posts/{id}', 'update');
    Route::delete('/posts/{id}', 'destroy');
});

Route::controller(RecruitmentController::class)->group(function () {
    Route::get('/recruitments', 'index');
    Route::post('/recruitments', 'store');
    Route::get('/recruitments/{id}', 'show');
    Route::put('/recruitments/{id}', 'update');
    Route::delete('/recruitments/{id}', 'destroy');
});

Route::get('post/test/{$id}', [PostController::class, 'test']);
