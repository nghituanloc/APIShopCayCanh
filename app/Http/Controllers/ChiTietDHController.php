<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDH;
use Illuminate\Http\Request;

class ChiTietDHController extends Controller
{
    public function index()
    {
        $ctdh = ChiTietDH::all();
        return response()->json($ctdh);
    }

    public function store(Request $request)
    {
        $ct = ChiTietDH::create($request->all());
        return response()->json($ct, 201);
    }

    public function show($tendangnhapkh)
    {
        $chitietdh = ChiTietDH::select(
                'CHITIETDH.*',
                'KHACHHANG.HOTENKH',
                'SANPHAM.TENSP',
                'DONHANG.NGAYDAT',
                'DONHANG.DIACHIGIAOHANG'
            )
            ->join('KHACHHANG', 'CHITIETDH.TENDANGNHAPKH', '=', 'KHACHHANG.TENDANGNHAPKH')
            ->join('SANPHAM', 'CHITIETDH.MASP', '=', 'SANPHAM.MASP')
            ->join('DONHANG', 'CHITIETDH.MADH', '=', 'DONHANG.MADH')
            ->where('CHITIETDH.TENDANGNHAPKH', $tendangnhapkh)
            ->get();
    
        if ($chitietdh->isNotEmpty()) {
            return response()->json($chitietdh, 200);
        }
    
        return response()->json(['message' => 'Không có chi tiết đơn hàng nào cho tài khoản này'], 404);
    }
    
    

    public function update(Request $request, $id)
    {
        // Tìm bản ghi theo MACTDH
        $chitietdh = ChiTietDH::find($id);
    
        // Kiểm tra nếu bản ghi không tồn tại
        if (!$chitietdh) {
            return response()->json(['message' => 'Chi tiết đơn hàng không tồn tại'], 404);
        }
    
        // Cập nhật dữ liệu
        $chitietdh->update($request->all());
    
        return response()->json(['message' => 'Cập nhật thành công', 'data' => $chitietdh], 200);
    }
    public function destroy($id)
    {
        // Tìm bản ghi theo MACTDH
        $chitietdh = ChiTietDH::find($id);
    
        // Kiểm tra nếu bản ghi không tồn tại
        if (!$chitietdh) {
            return response()->json(['message' => 'Chi tiết đơn hàng không tồn tại'], 404);
        }
    
        // Xóa bản ghi
        $chitietdh->delete();
    
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
    
}
