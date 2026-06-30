<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Verb;
use Illuminate\Support\Facades\Auth;

class ManageLogicController extends Controller
{
    public function storeVerb(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'verb' => 'required|string',
            'meaning' => 'nullable|string|max:1000',
        ]);

        Verb::create([
            'type'    => $request->type,
            'verb'    => $request->verb,
            'meaning' => $request->meaning,
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Verb added successfully.');
    }

    public function updateVerb(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'verb' => 'required|string',
            'meaning' => 'nullable|string|max:1000',
        ]);
        $verb = Verb::find($id);

        if (!$verb) {
            return response()->json([
                'success' => false,
                'message' => 'Verb not found.'
            ], 404);
        }

        $verb->update([
            'type' => $request->type,
            'verb' => $request->verb,
            'meaning' => $request->meaning,
        ]);

        return back()->with('success', 'Verb updated successfully.');
    }

    public function destroyVerb($verb)
    {
        $verb = Verb::find($verb);

        if (!$verb) {
            return redirect()
                ->back()
                ->with('error', 'Logic not found.');
        }

        $verb->delete();

        return redirect()
            ->back()
            ->with('success', 'Logic deleted successfully.');
    }
}
