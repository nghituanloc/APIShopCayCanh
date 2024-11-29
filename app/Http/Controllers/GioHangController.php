<?php
namespace App\Http\Controllers;

use App\Models\GioHang;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function index()
    {
        return response()->json(GioHang::all(), 200);
    }

    public function store(Request $request)
    {
        $gioHang = GioHang::create($request->all());
        return response()->json($gioHang, 201);
    }

    public function show($id)
    {
        $gioHang = GioHang::find($id);
        if (!$gioHang) {
            return response()->json(['message' => 'GioHang not found'], 404);
        }
        return response()->json($gioHang, 200);
    }

    public function update(Request $request, $id)
    {
        $gioHang = GioHang::find($id);
        if (!$gioHang) {
            return response()->json(['message' => 'GioHang not found'], 404);
        }
        $gioHang->update($request->all());
        return response()->json($gioHang, 200);
    }

    public function destroy($id)
    {
        $gioHang = GioHang::find($id);
        if (!$gioHang) {
            return response()->json(['message' => 'GioHang not found'], 404);
        }
        $gioHang->delete();
        return response()->json(['message' => 'GioHang deleted'], 200);
    }
}
