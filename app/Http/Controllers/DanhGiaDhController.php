<?php
namespace App\Http\Controllers;

use App\Models\DanhGiaDh;
use Illuminate\Http\Request;

class DanhGiaDhController extends Controller
{
    public function index()
    {
        return response()->json(DanhGiaDh::all(), 200);
    }

    public function store(Request $request)
    {
        $danhGia = DanhGiaDh::create($request->all());
        return response()->json($danhGia, 201);
    }

    public function show($id)
    {
        $danhGia = DanhGiaDh::find($id);
        if (!$danhGia) {
            return response()->json(['message' => 'DanhGia not found'], 404);
        }
        return response()->json($danhGia, 200);
    }

    public function update(Request $request, $id)
    {
        $danhGia = DanhGiaDh::find($id);
        if (!$danhGia) {
            return response()->json(['message' => 'DanhGia not found'], 404);
        }
        $danhGia->update($request->all());
        return response()->json($danhGia, 200);
    }

    public function destroy($id)
    {
        $danhGia = DanhGiaDh::find($id);
        if (!$danhGia) {
            return response()->json(['message' => 'DanhGia not found'], 404);
        }
        $danhGia->delete();
        return response()->json(['message' => 'DanhGia deleted'], 200);
    }
}
