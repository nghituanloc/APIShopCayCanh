<?php
namespace App\Http\Controllers;

use App\Models\Thamchieu;
use Illuminate\Http\Request;

class ThamchieuController extends Controller
{
    public function index()
    {
        return response()->json(Thamchieu::all(), 200);
    }

    public function store(Request $request)
    {
        $thamchieu = Thamchieu::create($request->all());
        return response()->json($thamchieu, 201);
    }

    public function show($id)
    {
        $thamchieu = Thamchieu::find($id);
        if (!$thamchieu) {
            return response()->json(['message' => 'Thamchieu not found'], 404);
        }
        return response()->json($thamchieu, 200);
    }

    public function update(Request $request, $id)
    {
        $thamchieu = Thamchieu::find($id);
        if (!$thamchieu) {
            return response()->json(['message' => 'Thamchieu not found'], 404);
        }
        $thamchieu->update($request->all());
        return response()->json($thamchieu, 200);
    }

    public function destroy($id)
    {
        $thamchieu = Thamchieu::find($id);
        if (!$thamchieu) {
            return response()->json(['message' => 'Thamchieu not found'], 404);
        }
        $thamchieu->delete();
        return response()->json(['message' => 'Thamchieu deleted'], 200);
    }
}
