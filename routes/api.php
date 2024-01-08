<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function(){
    return response()->json([
        'status'=>false,
        'message'=>'akses tidak diperbolehkan',
    ], 401);
})->name('login');

// Route::get('/', [AuthController::class, 'index']);
Route::get('product', [ProductController::class, 'index'])->middleware('auth:sanctum');
Route::post('registerUser', [AuthController::class, 'registerUser']);
Route::post('loginUser', [AuthController::class, 'loginUser']);
