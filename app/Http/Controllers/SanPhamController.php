<?php
namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index()
    {
        return response()->json(SanPham::all(), 200);
    }

    public function store(Request $request)
    {
        $sanPham = SanPham::create($request->all());
        return response()->json($sanPham, 201);
    }

    public function show($id)
    {
        $sanPham = SanPham::find($id);
        if (!$sanPham) {
            return response()->json(['message' => 'SanPham not found'], 404);
        }
        return response()->json($sanPham, 200);
    }

    public function update(Request $request, $id)
    {
        $sanPham = SanPham::find($id);
        if (!$sanPham) {
            return response()->json(['message' => 'SanPham not found'], 404);
        }
        $sanPham->update($request->all());
        return response()->json($sanPham, 200);
    }

    public function destroy($id)
    {
        $sanPham = SanPham::find($id);
        if (!$sanPham) {
            return response()->json(['message' => 'SanPham not found'], 404);
        }
        $sanPham->delete();
        return response()->json(['message' => 'SanPham deleted'], 200);
    }
}
