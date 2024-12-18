<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KhachHangController extends Controller
{
    public function index()
    {
        // Kiểm tra xem khách hàng đã đăng nhập chưa (nếu muốn bảo vệ)

        
        $khachhang = KhachHang::all();
        return response()->json($khachhang);
    }

    public function store(Request $request)
    {
        // Kiểm tra đăng nhập, nếu yêu cầu: có thể bỏ qua nếu đây là endpoint cho đăng ký
        // if(!session()->has('kh_logged_in')) {
        //     return response()->json(['message' => 'Chưa đăng nhập'], 401);
        // }

        $data = $request->all();
        if(isset($data['MATKHAUKH'])){
            $data['MATKHAUKH'] = Hash::make($data['MATKHAUKH']);
        }

        $kh = KhachHang::create($data);
        return response()->json($kh, 201);
    }

    public function show($id)
    {
        // if(!session()->has('kh_logged_in')) {
        //     return response()->json(['message' => 'Chưa đăng nhập'], 401);
        // }

        $kh = KhachHang::find($id);
        if(!$kh) return response()->json(['message' => 'Not found'], 404);
        return response()->json($kh);
    }

    public function update(Request $request, $id)
    {
        // if(!session()->has('kh_logged_in')) {
        //     return response()->json(['message' => 'Chưa đăng nhập'], 401);
        // }
    
        $kh = KhachHang::find($id);
        if(!$kh) return response()->json(['message' => 'Not found'], 404);
    
        $data = $request->all();
        
        // Không cho phép cập nhật TENDANGNHAPKH
        if (isset($data['TENDANGNHAPKH'])) {
            unset($data['TENDANGNHAPKH']);
        }
    
        if(isset($data['MATKHAUKH'])){
            $data['MATKHAUKH'] = Hash::make($data['MATKHAUKH']);
        }
    
        $kh->update($data);
        return response()->json($kh);
    }
    
    public function destroy($id)
    {
        // if(!session()->has('kh_logged_in')) {
        //     return response()->json(['message' => 'Chưa đăng nhập'], 401);
        // }

        $kh = KhachHang::find($id);
        if(!$kh) return response()->json(['message' => 'Not found'], 404);

        $kh->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }

    /**
     * Đăng nhập khách hàng
     * Request gồm: TENDANGNHAPKH, MATKHAUKH
     */
    public function login(Request $request)
    {
        $username = $request->input('TENDANGNHAPKH');
        $password = $request->input('MATKHAUKH');

        $kh = KhachHang::find($username);
        if(!$kh) {
            return response()->json(['message' => 'Tên đăng nhập không tồn tại'], 404);
        }

        if (!Hash::check($password, $kh->MATKHAUKH)) {
            return response()->json(['message' => 'Sai mật khẩu'], 401);
        }

        // Tạo session
        session(['kh_logged_in' => $kh->TENDANGNHAPKH]);

        return response()->json([
            'message' => 'Đăng nhập thành công',
            'TENDANGNHAPKH' => $kh->TENDANGNHAPKH
        ], 200);
    }

    /**
     * Đăng xuất khách hàng
     */
    public function logout()
    {
        session()->forget('kh_logged_in');
        return response()->json(['message' => 'Đã đăng xuất']);
    }
}
