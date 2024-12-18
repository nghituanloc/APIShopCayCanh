<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function index()
    {
        $giohangs = GioHang::all();
        return response()->json($giohangs);
    }

    public function store(Request $request)
    {
        // Kiểm tra nếu TENDANGNHAPKH đã tồn tại
        $exists = GioHang::where('TENDANGNHAPKH', $request->TENDANGNHAPKH)->exists();

        if ($exists) {
            return response()->json(['message' => 'Giỏ hàng đã tồn tại cho tài khoản này'], 409); // HTTP 409: Conflict
        }

        // Tạo mới nếu chưa tồn tại
        $data = $request->validate([
            'TENDANGNHAPKH' => 'required|string|max:50',
            'TAMTINH' => 'nullable|numeric'
        ]);

        $gh = GioHang::create($data);
        return response()->json($gh, 201);
    }

    public function show($tendangnhapkh)
    {
        // Tìm giỏ hàng theo TENDANGNHAPKH và nạp sẵn quan hệ chua.sanPham
        $gh = GioHang::where('TENDANGNHAPKH', $tendangnhapkh)
            ->with(['chua.sanPham'])
            ->first();

        if (!$gh) {
            return response()->json(['message' => 'Giỏ hàng không tồn tại'], 404);
        }

        // Lấy sản phẩm đầu tiên trong giỏ (giả sử giỏ hàng luôn có ít nhất 1 sản phẩm)
        $chuaItem = $gh->chua->first();
        if (!$chuaItem) {
            return response()->json(['message' => 'Giỏ hàng không có sản phẩm'], 404);
        }

        // Chuẩn bị dữ liệu trả về
        $data = [
            'MAGH'            => $gh->MAGH,
            'TENDANGNHAPKH'   => $gh->TENDANGNHAPKH,
            'TAMTINH'         => $gh->TAMTINH,
            'TENSP'           => $chuaItem->sanPham->TENSP,
            'SOLUONG'         => $chuaItem->SOLUONG
        ];

        return response()->json($data);
    }



    public function update(Request $request, $tendangnhapkh)
    {
        // Tìm giỏ hàng theo TENDANGNHAPKH
        $gh = GioHang::where('TENDANGNHAPKH', $tendangnhapkh)->first();

        if (!$gh) {
            return response()->json(['message' => 'Giỏ hàng không tồn tại'], 404);
        }

        // Cập nhật dữ liệu
        $data = $request->validate([
            'TAMTINH' => 'nullable|numeric'
        ]);

        $gh->update($data);

        return response()->json(['message' => 'Cập nhật thành công', 'data' => $gh], 200);
    }

    public function destroy($tendangnhapkh)
    {
        $gh = GioHang::where('TENDANGNHAPKH', $tendangnhapkh)->first();

        if (!$gh) {
            return response()->json(['message' => 'Giỏ hàng không tồn tại'], 404);
        }
        $gh->delete();

        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
