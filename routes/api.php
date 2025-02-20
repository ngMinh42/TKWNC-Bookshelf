<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;

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

// Route mặc định để lấy thông tin người dùng đã xác thực (nếu cần)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Các route cho API Books
Route::get('/books', [BookController::class, 'index']); // Lấy danh sách tất cả sách
Route::post('/books', [BookController::class, 'store']); // Thêm sách mới
Route::get('/books/{book}', [BookController::class, 'show']); // Lấy thông tin sách theo ID
Route::put('/books/{book}', [BookController::class, 'update']); // Cập nhật thông tin sách
Route::delete('/books/{book}', [BookController::class, 'destroy']); // Xóa sách
