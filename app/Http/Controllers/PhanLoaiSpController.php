<?php
namespace App\Http\Controllers;

use App\Models\PhanLoaiSp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhanLoaiSpController extends Controller
{
    /**
     * Lấy danh sách tất cả phân loại sản phẩm.
     */
    public function index()
    {
        $phanLoaiSp = PhanLoaiSp::all();
        return response()->json($phanLoaiSp, 200);
    }

    /**
     * Tạo mới một phân loại sản phẩm.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'TEN_PHAN_LOAI' => 'required|string|max:20|unique:phan_loai_sp,TEN_PHAN_LOAI',
            'MO_TA_PL' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Tạo mới phân loại sản phẩm
        $phanLoaiSp = PhanLoaiSp::create($request->all());
        return response()->json($phanLoaiSp, 201);
    }

    /**
     * Lấy thông tin chi tiết của một phân loại sản phẩm.
     */
    public function show($id)
    {
        $phanLoaiSp = PhanLoaiSp::find($id);
        if (!$phanLoaiSp) {
            return response()->json(['message' => 'Phân loại sản phẩm không tồn tại'], 404);
        }
        return response()->json($phanLoaiSp, 200);
    }

    /**
     * Cập nhật thông tin một phân loại sản phẩm.
     */
    public function update(Request $request, $id)
    {
        $phanLoaiSp = PhanLoaiSp::find($id);
        if (!$phanLoaiSp) {
            return response()->json(['message' => 'Phân loại sản phẩm không tồn tại'], 404);
        }

        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'TEN_PHAN_LOAI' => 'required|string|max:20|unique:phan_loai_sp,TEN_PHAN_LOAI,' . $id . ',MA_PHAN_LOAI',
            'MO_TA_PL' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Cập nhật phân loại sản phẩm
        $phanLoaiSp->update($request->all());
        return response()->json($phanLoaiSp, 200);
    }

    /**
     * Xóa một phân loại sản phẩm.
     */
    public function destroy($id)
    {
        $phanLoaiSp = PhanLoaiSp::find($id);
        if (!$phanLoaiSp) {
            return response()->json(['message' => 'Phân loại sản phẩm không tồn tại'], 404);
        }

        $phanLoaiSp->delete();
        return response()->json(['message' => 'Phân loại sản phẩm đã được xóa'], 200);
    }
}
