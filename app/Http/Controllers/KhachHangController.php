<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function index()
    {
        return response()->json(KhachHang::all(), 200);
    }

    public function store(Request $request)
    {
        $khachHang = KhachHang::create($request->all());
        return response()->json($khachHang, 201);
    }

    public function show($id)
    {
        $khachHang = KhachHang::find($id);
        if (!$khachHang) {
            return response()->json(['message' => 'KhachHang not found'], 404);
        }
        return response()->json($khachHang, 200);
    }

    public function update(Request $request, $id)
    {
        $khachHang = KhachHang::find($id);
        if (!$khachHang) {
            return response()->json(['message' => 'KhachHang not found'], 404);
        }
        $khachHang->update($request->all());
        return response()->json($khachHang, 200);
    }

    public function destroy($id)
    {
        $khachHang = KhachHang::find($id);
        if (!$khachHang) {
            return response()->json(['message' => 'KhachHang not found'], 404);
        }
        $khachHang->delete();
        return response()->json(['message' => 'KhachHang deleted'], 200);
    }
}
