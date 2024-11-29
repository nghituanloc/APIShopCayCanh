<?php
namespace App\Http\Controllers;

use App\Models\Them;
use Illuminate\Http\Request;

class ThemController extends Controller
{
    public function index()
    {
        return response()->json(Them::all(), 200);
    }

    public function store(Request $request)
    {
        $them = Them::create($request->all());
        return response()->json($them, 201);
    }

    public function show($id)
    {
        $them = Them::find($id);
        if (!$them) {
            return response()->json(['message' => 'Them not found'], 404);
        }
        return response()->json($them, 200);
    }

    public function update(Request $request, $id)
    {
        $them = Them::find($id);
        if (!$them) {
            return response()->json(['message' => 'Them not found'], 404);
        }
        $them->update($request->all());
        return response()->json($them, 200);
    }

    public function destroy($id)
    {
        $them = Them::find($id);
        if (!$them) {
            return response()->json(['message' => 'Them not found'], 404);
        }
        $them->delete();
        return response()->json(['message' => 'Them deleted'], 200);
    }
}
