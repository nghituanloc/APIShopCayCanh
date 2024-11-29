<?php
namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function index()
    {
        return response()->json(DonHang::all(), 200);
    }

    public function store(Request $request)
    {
        $donHang = DonHang::create($request->all());
        return response()->json($donHang, 201);
    }

    public function show($id)
    {
        $donHang = DonHang::find($id);
        if (!$donHang) {
            return response()->json(['message' => 'DonHang not found'], 404);
        }
        return response()->json($donHang, 200);
    }

    public function update(Request $request, $id)
    {
        $donHang = DonHang::find($id);
        if (!$donHang) {
            return response()->json(['message' => 'DonHang not found'], 404);
        }
        $donHang->update($request->all());
        return response()->json($donHang, 200);
    }

    public function destroy($id)
    {
        $donHang = DonHang::find($id);
        if (!$donHang) {
            return response()->json(['message' => 'DonHang not found'], 404);
        }
        $donHang->delete();
        return response()->json(['message' => 'DonHang deleted'], 200);
    }
}

