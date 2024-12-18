<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        // Kiểm tra xem admin đã đăng nhập chưa (nếu cần)
        // if(!session()->has('admin_logged_in')) {
        //     return response()->json(['message' => 'Chưa đăng nhập'], 401);
        // }

        $admins = Admin::all();
        return response()->json($admins);
    }

    public function store(Request $request)
    {
        // Kiểm tra đăng nhập trước khi cho tạo mới (tùy chính sách)
        // if(!session()->has('admin_logged_in')) {
        //     return response()->json(['message' => 'Chưa đăng nhập'], 401);
        // }

        $data = $request->all();
        if(isset($data['MATKHAUADMIN'])){
            $data['MATKHAUADMIN'] = Hash::make($data['MATKHAUADMIN']);
        }

        $admin = Admin::create($data);
        return response()->json($admin, 201);
    }

    public function show($id)
    {
        // if(!session()->has('admin_logged_in')) {
        //     return response()->json(['message' => 'Chưa đăng nhập'], 401);
        // }

        $admin = Admin::find($id);
        if(!$admin) return response()->json(['message' => 'Not found'], 404);
        return response()->json($admin);
    }

    public function update(Request $request, $id)
    {
        // Bỏ qua kiểm tra session để test Postman
        // if (!session()->has('admin_logged_in')) {
        //     return response()->json(['message' => 'Chưa đăng nhập'], 401);
        // }
    
        // Tìm admin theo ID
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Not found'], 404);
        }
    
        // Chỉ lấy các trường MATKHAUADMIN và HOTENADMIN
        $data = $request->only(['MATKHAUADMIN', 'HOTENADMIN']);
    
        // Kiểm tra và mã hóa mật khẩu nếu tồn tại
        if (isset($data['MATKHAUADMIN'])) {
            $data['MATKHAUADMIN'] = Hash::make($data['MATKHAUADMIN']);
        }
    
        // Cập nhật thông tin admin
        $admin->update($data);
    
        // Trả về thông tin admin đã cập nhật
        return response()->json($admin);
    }

    
        public function destroy($id)
    {
        // if(!session()->has('admin_logged_in')) {
        //     return response()->json(['message' => 'Chưa đăng nhập'], 401);
        // }

        $admin = Admin::find($id);
        if(!$admin) return response()->json(['message' => 'Not found'], 404);

        $admin->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }

    /**
     * Đăng nhập: kiểm tra username và password.
     * Nếu thành công, tạo session.
     */
    public function login(Request $request)
    {
        $username = $request->input('TENDANGNHAPADMIN');
        $password = $request->input('MATKHAUADMIN');

        $admin = Admin::find($username);
        if(!$admin) {
            return response()->json(['message' => 'Tên đăng nhập không tồn tại'], 404);
        }

        if (!Hash::check($password, $admin->MATKHAUADMIN)) {
            return response()->json(['message' => 'Sai mật khẩu'], 401);
        }

        // Tạo session lưu thông tin đăng nhập
        session(['admin_logged_in' => $admin->TENDANGNHAPADMIN]);

        return response()->json([
            'message' => 'Đăng nhập thành công',
            'TENDANGNHAPADMIN' => $admin->TENDANGNHAPADMIN
        ], 200);    }

    /**
     * Đăng xuất: Xóa session
     */
    public function logout()
    {
        session()->forget('admin_logged_in');
        return response()->json(['message' => 'Đã đăng xuất']);
    }
}
