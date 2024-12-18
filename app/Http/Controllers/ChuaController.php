<?php

namespace App\Http\Controllers;

use App\Models\Chua;
use Illuminate\Http\Request;

class ChuaController extends Controller
{
    public function index()
    {
        $chuas = Chua::all();
        return response()->json($chuas, 200);
    }

    // Thêm mới một chùa
    public function store(Request $request)
    {
        $data = $request->validate([
            'MAGH' => 'required|integer',
            'MASP' => 'required|integer',
            'SOLUONG' => 'nullable|integer|min:1'

        ]);

        $chua = Chua::create($data);
        return response()->json(['message' => 'Bảng chứa đã được tạo thành công', 'data' => $chua], 201);
    }
    // Hiển thị thông tin theo MAGH và MASP
    public function show($magh, $masp)
    {
        // Tìm bản ghi với MAGH và MASP
        $chua = Chua::where('MAGH', $magh)
                    ->where('MASP', $masp)
                    ->first();

        if (!$chua) {
            return response()->json(['message' => 'Không tìm thấy bản ghi'], 404);
        }

        return response()->json($chua, 200);
    }

    // Cập nhật thông tin theo MAGH và MASP
    public function update(Request $request, $magh, $masp)
    {
        // Tìm bản ghi với MAGH và MASP
        $chua = Chua::where('MAGH', $magh)
                    ->where('MASP', $masp)
                    ->first();
    
        if (!$chua) {
            return response()->json(['message' => 'Không tìm thấy bản ghi'], 404);
        }
    
        $data = $request->validate([
            'SOLUONG' => 'nullable|integer|min:1',
        ]);
    
        // Cập nhật thông tin
        $chua->update($data);
    
        return response()->json(['message' => 'Cập nhật thành công', 'data' => $chua], 200);
    }
    
}
