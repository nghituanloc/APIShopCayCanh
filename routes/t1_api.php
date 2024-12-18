<!-- <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiSPController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\ChuaController;
use App\Http\Controllers\ChiTietDHController;
use App\Http\Controllers\DanhGiaController;

// Route login, logout cho Admin
Route::post('admin/login', [AdminController::class, 'login']);
Route::post('admin/logout', [AdminController::class, 'logout']);

// Tài nguyên cho Admin (CRUD)
Route::apiResource('admin', AdminController::class);

// Route login, logout cho Khách Hàng
Route::post('khachhang/login', [KhachHangController::class, 'login']);
Route::post('khachhang/logout', [KhachHangController::class, 'logout']);

// Tài nguyên cho Khách Hàng (CRUD)
Route::apiResource('khachhang', KhachHangController::class);

// Tài nguyên cho Loại Sản Phẩm
Route::apiResource('loaisp', LoaiSPController::class);

// Tài nguyên cho Sản Phẩm
Route::apiResource('sanpham', SanPhamController::class);

// Tài nguyên cho Đơn Hàng
Route::apiResource('donhang', DonHangController::class);

// Tài nguyên cho Giỏ Hàng
Route::apiResource('giohang', GioHangController::class);

// Tài nguyên cho Chứa (bảng trung gian giữa Giỏ Hàng và Sản Phẩm)
// Lưu ý: CHUA có khóa chính phức tạp, nếu cần route chi tiết, bạn phải định nghĩa thủ công
Route::apiResource('chua', ChuaController::class)->except(['show','update','destroy']);
// Ví dụ route thủ công cho show, update, destroy CHUA (nếu cần):
// Route::get('chua/{magh}/{masp}', [ChuaController::class, 'show']);
// Route::put('chua/{magh}/{masp}', [ChuaController::class, 'update']);
// Route::delete('chua/{magh}/{masp}', [ChuaController::class, 'destroy']);

// Tài nguyên cho Chi Tiết Đơn Hàng (CHITIETDH)
// Tương tự, có khóa chính phức tạp, định nghĩa thủ công nếu cần
Route::apiResource('chitietdh', ChiTietDHController::class)->except(['show','update','destroy']);
// Ví dụ route thủ công:
// Route::get('chitietdh/{madh}/{masp}/{tendangnhapkh}', [ChiTietDHController::class, 'show']);
// Route::put('chitietdh/{madh}/{masp}/{tendangnhapkh}', [ChiTietDHController::class, 'update']);
// Route::delete('chitietdh/{madh}/{masp}/{tendangnhapkh}', [ChiTietDHController::class, 'destroy']);

// Tài nguyên cho Đánh Giá (DANHGIA)
// Cũng có khóa chính phức tạp
Route::apiResource('danhgia', DanhGiaController::class)->except(['show','update','destroy']);
// Ví dụ route thủ công:
// Route::get('danhgia/{tendangnhapkh}/{masp}', [DanhGiaController::class, 'show']);
// Route::put('danhgia/{tendangnhapkh}/{masp}', [DanhGiaController::class, 'update']);
// Route::delete('danhgia/{tendangnhapkh}/{masp}', [DanhGiaController::class, 'destroy']); -->


