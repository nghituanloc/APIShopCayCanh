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
        try {
            $data = $request->validate([
                'MADH' => 'required|integer|exists:donhang,MADH',
                'MASP' => 'required|integer|exists:sanpham,MASP',
                'SOLUONGMUA' => 'required|integer|min:1',
            ]);
    
            $chiTietDH = ChiTietDH::create($data);
    
            return response()->json($chiTietDH, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => 'Lỗi validate dữ liệu', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi khi thêm chi tiết đơn hàng', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($madh, $masp)
    {
        try {
            // Lấy thông tin chi tiết đơn hàng với các quan hệ đã định nghĩa
            $chitietdh = ChiTietDH::with(['donhang', 'sanpham'])
                ->where('MADH', $madh)
                ->where('MASP', $masp)
                ->first();
    
            // Kiểm tra nếu không tìm thấy
            if (!$chitietdh) {
                return response()->json(['message' => 'Không tìm thấy chi tiết đơn hàng'], 404);
            }
    
            // Trả về dữ liệu ở dạng JSON
            return response()->json([
                'MADH'          => $chitietdh->MADH,
                'MASP'          => $chitietdh->MASP,
                'TENSP'         => $chitietdh->sanpham->TENSP,
                'HINHANHSP'     => $chitietdh->sanpham->HINHANHSP,
                'GIASP'         => $chitietdh->sanpham->GIASP,
                'SOLUONGMUA'    => $chitietdh->SOLUONGMUA,
                'NGAYDAT'       => $chitietdh->donhang->NGAYDAT,
                'DIACHIGIAOHANG' => $chitietdh->donhang->DIACHIGIAOHANG,
                'TONGTIEN_DONHANG' => $chitietdh->donhang->TONGTIEN, 
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi khi lấy thông tin chi tiết đơn hàng', 'error' => $e->getMessage()], 500);
        }
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
    public function Baocao()
    {
        try {
            $baocao = ChiTietDH::with(['donhang.khachhang', 'sanpham'])
                ->get()
                ->map(function ($ctdh) {
                    return [
                        'NGAYDAT' => $ctdh->donhang->NGAYDAT,
                        'TONGTIEN' => $ctdh->donhang->TONGTIEN,
                        'TENSP' => $ctdh->sanpham->TENSP,
                        'SOLUONGMUA' => $ctdh->SOLUONGMUA,
                        'HOTENKH' => $ctdh->donhang->khachhang->HOTENKH,
                    ];
                });

            return response()->json($baocao, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi khi tạo báo cáo', 'error' => $e->getMessage()], 500);
        }
    }
}
