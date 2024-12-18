<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChiTietDHController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiSPController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ChuaController;

// Route::prefix('admin')->middleware('admin.auth')->group(function () {
//     Route::put('/{id}', action: [AdminController::class, 'update']);
//     Route::delete('/{id}', action: [AdminController::class, 'destroy']);
// });
Route::post('admin/login', [AdminController::class, 'login']);
Route::post('admin/logout', [AdminController::class, 'logout']);
Route::post('khachhang/login', [KhachHangController::class, 'login']);
Route::post('khachhang/logout', [KhachHangController::class, 'logout']);


// Route cho Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::post('/create', [AdminController::class, 'store']);
    Route::get('/{id}', [AdminController::class, 'show']);
    // Route::put(uri: '/{id}', [AdminController::class, 'update']);
    Route::put('/{id}', action: [AdminController::class, 'update']);

    Route::delete('/{id}', action: [AdminController::class, 'destroy']);
});

// Route cho Chi Tiết Đơn Hàng
Route::prefix('chitietdh')->group(function () {
    Route::get('/', [ChiTietDHController::class, 'index']);
    Route::post('/create', [ChiTietDHController::class, 'store']);
    Route::get('/{id}', [ChiTietDHController::class, 'show']);
    Route::put('/{id}', [ChiTietDHController::class, 'update']);
    Route::delete('/{id}', [ChiTietDHController::class, 'destroy']);
});

// Route cho Đánh Giá
Route::prefix('danhgia')->group(function () {
    Route::get('/', [DanhGiaController::class, 'index']);
    Route::post('/create', [DanhGiaController::class, 'store']);
    Route::get('/{id}', [DanhGiaController::class, 'show']);
    Route::put('/{id}', [DanhGiaController::class, 'update']);
    Route::delete('/{id}', [DanhGiaController::class, 'destroy']);
});

// Route cho Đơn Hàng
Route::prefix('donhang')->group(function () {
    Route::get('/', [DonHangController::class, 'index']);
    Route::post('/create', [DonHangController::class, 'store']);
    Route::get('/{id}', [DonHangController::class, 'show']);
    Route::put('/{id}', [DonHangController::class, 'update']);
    Route::delete('/{id}', [DonHangController::class, 'destroy']);
});

// Route cho Giỏ Hàng
Route::prefix('giohang')->group(function () {
    Route::get('/', [GioHangController::class, 'index']);
    Route::post('/create', [GioHangController::class, 'store']);
    Route::get('/{id}', [GioHangController::class, 'show']);
    Route::put('/{id}', [GioHangController::class, 'update']);
    Route::delete('/{id}', [GioHangController::class, 'destroy']);
});

// Route cho Khách Hàng
Route::prefix('khachhang')->group(function () {
    Route::get('/', [KhachHangController::class, 'index']);
    Route::post('/create', [KhachHangController::class, 'store']);
    Route::get('/{id}', [KhachHangController::class, 'show']);
    Route::put('/{id}', [KhachHangController::class, 'update']);
    Route::delete('/{id}', [KhachHangController::class, 'destroy']);
});

// Route cho Loại Sản Phẩm
Route::prefix('loaisp')->group(function () {
    Route::get('/', [LoaiSPController::class, 'index']);
    Route::post('/create', [LoaiSPController::class, 'store']);
    Route::get('/{id}', [LoaiSPController::class, 'show']);
    Route::put('/{id}', [LoaiSPController::class, 'update']);
    Route::delete('/{id}', [LoaiSPController::class, 'destroy']);
});

// Route cho Sản Phẩm
Route::prefix('sanpham')->group(function () {
    Route::get('/', [SanPhamController::class, 'index']);
    Route::post('/create', [SanPhamController::class, 'store']);
    Route::get('/{id}', [SanPhamController::class, 'show']);
    Route::put('/{id}', [SanPhamController::class, 'update']);
    Route::delete('/{id}', [SanPhamController::class, 'destroy']);
});

// Route cho Chua
Route::prefix('chua')->group(function () {
Route::get('/', [ChuaController::class, 'index']); // Lấy danh sách tất cả bản ghi
Route::post('/create', [ChuaController::class, 'store']); // Thêm mới bản ghi
Route::get('/{magh}/{masp}', [ChuaController::class, 'show']); // Xem chi tiết theo MAGH và MASP
Route::put('/{magh}/{masp}', [ChuaController::class, 'update']); // Cập nhật thông tin theo MAGH và MASP
Route::delete('/{magh}/{masp}', [ChuaController::class, 'destroy']); 
});