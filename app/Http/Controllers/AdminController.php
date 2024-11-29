<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Lấy danh sách tất cả Admin.
     */
    public function index()
    {
        $admins = Admin::all();
        return response()->json($admins, 200);
    }

    /**
     * Tạo mới một Admin.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'TENDANGNHAPADMIN' => 'required|string|max:50|unique:admin,TENDANGNHAPADMIN',
            'MATKHAUADMIN' => 'required|string|min:6|max:255',
            'HOTENADMIN' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Tạo mới Admin
        $admin = Admin::create($request->all());

        return response()->json($admin, 201);
    }


    /**
     * Lấy thông tin chi tiết một Admin.
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }
        return response()->json($admin, 200);
    }

    /**
     * Cập nhật thông tin một Admin.
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }

        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'TENDANGNHAPADMIN' => 'required|string|max:50|unique:admin,TENDANGNHAPADMIN,' . $id . ',TENDANGNHAPADMIN',
            'MATKHAUADMIN' => 'nullable|string|min:6|max:255',
            'HOTENADMIN' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Cập nhật Admin
        $admin->update($request->all());

        return response()->json($admin, 200);
    }

    /**
     * Xóa một Admin.
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }

        $admin->delete();
        return response()->json(['message' => 'Admin deleted'], 200);
    }
}
