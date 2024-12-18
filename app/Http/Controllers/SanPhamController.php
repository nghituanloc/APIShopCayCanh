<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index()
    {
        $sanphams = SanPham::all();
        return response()->json($sanphams);
    }

    public function store(Request $request)
    {
        $sp = SanPham::create($request->all());
        return response()->json($sp, 201);
    }

    public function show($id)
    {
        $sp = SanPham::find($id);
        if(!$sp) return response()->json(['message' => 'Not found'], 404);
        return response()->json($sp);
    }

    public function update(Request $request, $id)
    {
        $sp = SanPham::find($id);
        if(!$sp) return response()->json(['message' => 'Not found'], 404);

        $sp->update($request->all());
        return response()->json($sp);
    }

    public function destroy($id)
    {
        $sp = SanPham::find($id);
        if(!$sp) return response()->json(['message' => 'Not found'], 404);

        $sp->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
