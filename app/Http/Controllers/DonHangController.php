<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function index()
    {
        $donhangs = DonHang::all();
        return response()->json($donhangs);
    }

    public function store(Request $request)
    {
        $dh = DonHang::create($request->all());
        return response()->json($dh, 201);
    }

    public function show($id)
    {
        $dh = DonHang::find($id);
        if(!$dh) return response()->json(['message' => 'Not found'], 404);
        return response()->json($dh);
    }

    public function update(Request $request, $id)
    {
        $dh = DonHang::find($id);
        if(!$dh) return response()->json(['message' => 'Not found'], 404);

        $dh->update($request->all());
        return response()->json($dh);
    }

    public function destroy($id)
    {
        $dh = DonHang::find($id);
        if(!$dh) return response()->json(['message' => 'Not found'], 404);

        $dh->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
