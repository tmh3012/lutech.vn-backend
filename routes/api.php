<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
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

Route::group([
    'as' => 'employee.',
    'prefix'=> 'employee'
], function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('get.all');
    Route::get('/{id}', [EmployeeController::class, 'getById'])->name('get.by_id');
    Route::post('/store', [EmployeeController::class, 'store'])->name('store');
});

Route::group([
    'as' => '.post',
    'prefix' => 'post',
 ], function () {
   Route::get('/', [PostController::class, 'index'])->name('get.all');
   Route::get('/{id}', [PostController::class, 'getPostById'])->name('get.by_id');
});

Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
