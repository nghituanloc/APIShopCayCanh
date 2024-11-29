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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DanhGiaDhController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\PhanLoaiSpController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ThamchieuController;
use App\Http\Controllers\ThemController;

// Route::apiResource('admins', AdminController::class);
// Route::apiResource('danh-gia-dh', DanhGiaDhController::class);
// Route::apiResource('don-hangs', DonHangController::class);
// Route::apiResource('gio-hangs', GioHangController::class);
// Route::apiResource('khach-hangs', KhachHangController::class);
// Route::apiResource('phan-loai-sp', PhanLoaiSpController::class);
// Route::apiResource('san-phams', SanPhamController::class);
// Route::apiResource('thamchieus', ThamchieuController::class);
// Route::apiResource('thems', ThemController::class);
Route::get('admins', [AdminController::class, 'index']); // Lấy danh sách Admin
Route::post('admins', [AdminController::class, 'store']); // Thêm mới Admin
Route::get('admins/{id}', [AdminController::class, 'show']); // Lấy chi tiết một Admin
Route::put('admins/{id}', [AdminController::class, 'update']); // Cập nhật Admin
Route::delete('admins/{id}', [AdminController::class, 'destroy']); // Xóa Admin

Route::get('danh-gia-dh', [DanhGiaDhController::class, 'index']); // Lấy danh sách Đánh Giá
Route::post('danh-gia-dh', [DanhGiaDhController::class, 'store']); // Thêm mới Đánh Giá
Route::get('danh-gia-dh/{id}', [DanhGiaDhController::class, 'show']); // Lấy chi tiết một Đánh Giá
Route::put('danh-gia-dh/{id}', [DanhGiaDhController::class, 'update']); // Cập nhật Đánh Giá
Route::delete('danh-gia-dh/{id}', [DanhGiaDhController::class, 'destroy']); // Xóa Đánh Giá

Route::get('don-hangs', [DonHangController::class, 'index']); // Lấy danh sách Đơn Hàng
Route::post('don-hangs', [DonHangController::class, 'store']); // Thêm mới Đơn Hàng
Route::get('don-hangs/{id}', [DonHangController::class, 'show']); // Lấy chi tiết một Đơn Hàng
Route::put('don-hangs/{id}', [DonHangController::class, 'update']); // Cập nhật Đơn Hàng
Route::delete('don-hangs/{id}', [DonHangController::class, 'destroy']); // Xóa Đơn Hàng

Route::get('gio-hangs', [GioHangController::class, 'index']);
Route::post('gio-hangs', [GioHangController::class, 'store']);
Route::get('gio-hangs/{id}', [GioHangController::class, 'show']);
Route::put('gio-hangs/{id}', [GioHangController::class, 'update']);
Route::delete('gio-hangs/{id}', [GioHangController::class, 'destroy']);

Route::get('khach-hangs', [KhachHangController::class, 'index']);
Route::post('khach-hangs', [KhachHangController::class, 'store']);
Route::get('khach-hangs/{id}', [KhachHangController::class, 'show']);
Route::put('khach-hangs/{id}', [KhachHangController::class, 'update']);
Route::delete('khach-hangs/{id}', [KhachHangController::class, 'destroy']);

Route::get('phan-loai-sp', [PhanLoaiSpController::class, 'index']);
Route::post('phan-loai-sp', [PhanLoaiSpController::class, 'store']);
Route::get('phan-loai-sp/{id}', [PhanLoaiSpController::class, 'show']);
Route::put('phan-loai-sp/{id}', [PhanLoaiSpController::class, 'update']);
Route::delete('phan-loai-sp/{id}', [PhanLoaiSpController::class, 'destroy']);


Route::get('san-phams', [SanPhamController::class, 'index']); // Lấy danh sách tất cả sản phẩm
Route::post('san-phams', [SanPhamController::class, 'store']); // Tạo mới một sản phẩm
Route::get('san-phams/{id}', [SanPhamController::class, 'show']); // Lấy thông tin chi tiết một sản phẩm theo ID
Route::put('san-phams/{id}', [SanPhamController::class, 'update']); // Cập nhật thông tin một sản phẩm theo ID
Route::delete('san-phams/{id}', [SanPhamController::class, 'destroy']); // Xóa một sản phẩm theo ID

Route::get('thamchieus', [ThamchieuController::class, 'index']); // Lấy danh sách tất cả các tham chiếu
Route::post('thamchieus', [ThamchieuController::class, 'store']); // Tạo mới một tham chiếu
Route::get('thamchieus/{id}', [ThamchieuController::class, 'show']); // Lấy chi tiết một tham chiếu theo ID
Route::put('thamchieus/{id}', [ThamchieuController::class, 'update']); // Cập nhật thông tin một tham chiếu theo ID
Route::delete('thamchieus/{id}', [ThamchieuController::class, 'destroy']); // Xóa một tham chiếu theo ID


Route::get('thems', [ThemController::class, 'index']); // Lấy danh sách tất cả các sản phẩm được thêm vào giỏ hàng
Route::post('thems', [ThemController::class, 'store']); // Thêm sản phẩm mới vào giỏ hàng
Route::get('thems/{id}', [ThemController::class, 'show']); // Lấy chi tiết một sản phẩm trong giỏ hàng theo ID
Route::put('thems/{id}', [ThemController::class, 'update']); // Cập nhật thông tin sản phẩm trong giỏ hàng theo ID
Route::delete('thems/{id}', [ThemController::class, 'destroy']); // Xóa sản phẩm khỏi giỏ hàng theo ID

// //gộp các route có chung tiền tố (prefix) để quản lý dễ dàng hơn
// Route::prefix('api')->group(function () {
//     Route::apiResource('admins', AdminController::class);
//     Route::apiResource('danh-gia-dh', DanhGiaDhController::class);
//     Route::apiResource('don-hangs', DonHangController::class);
//     Route::apiResource('gio-hangs', GioHangController::class);
//     Route::apiResource('khach-hangs', KhachHangController::class);
//     Route::apiResource('phan-loai-sp', PhanLoaiSpController::class);
//     Route::apiResource('san-phams', SanPhamController::class);
//     Route::apiResource('thamchieus', ThamchieuController::class);
//     Route::apiResource('thems', ThemController::class);
// });
