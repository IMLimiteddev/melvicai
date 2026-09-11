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
        try {

            /*
            |--------------------------------------------------------------------------
            | NEW: Save multiple verbs from Logic Manager modal
            |--------------------------------------------------------------------------
            */

            if ($request->has('verbs')) {

                $validated = $request->validate([
                    'verbs' => 'required|array|min:1',

                    'verbs.*.type' => [
                        'required',
                        'string',
                        'in:Operator,Action'
                    ],

                    'verbs.*.verb' => [
                        'required',
                        'string',
                        'max:255'
                    ],

                    'verbs.*.meaning' => [
                        'nullable',
                        'string',
                        'max:1000'
                    ],
                ]);

                $createdVerbs = [];

                foreach ($validated['verbs'] as $item) {

                    $verb = Verb::create([
                        'type' => $item['type'],
                        'verb' => $item['verb'],
                        'meaning' => $item['meaning'] ?? null,
                        'user_id' => auth()->id(),
                    ]);

                    $createdVerbs[] = [
                        'id' => $verb->id,
                        'type' => $verb->type,
                        'verb' => $verb->verb,
                        'meaning' => $verb->meaning,
                        'creator' => auth()->user()->name ?? 'Unknown',
                    ];
                }

                /*
                |--------------------------------------------------------------------------
                | Return JSON because the modal uses fetch()
                |--------------------------------------------------------------------------
                */

                return response()->json([
                    'success' => true,
                    'message' => 'Verb(s) saved successfully.',
                    'verbs' => $createdVerbs,
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | OLD: Normal single verb save
            |--------------------------------------------------------------------------
            | This keeps your existing Add Verb functionality working.
            |--------------------------------------------------------------------------
            */

            $validated = $request->validate([
                'type' => [
                    'required',
                    'string',
                    'in:Operator,Action'
                ],

                'verb' => [
                    'required',
                    'string',
                    'max:255'
                ],

                'meaning' => [
                    'nullable',
                    'string',
                    'max:1000'
                ],
            ]);

            $verb = Verb::create([
                'type' => $validated['type'],
                'verb' => $validated['verb'],
                'meaning' => $validated['meaning'] ?? null,
                'user_id' => auth()->id(),
            ]);

            /*
            |--------------------------------------------------------------------------
            | If normal browser form submission
            |--------------------------------------------------------------------------
            */

            if (!$request->expectsJson()) {
                return back()->with(
                    'success',
                    'Verb saved successfully.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | If AJAX
            |--------------------------------------------------------------------------
            */

            return response()->json([
                'success' => true,
                'message' => 'Verb saved successfully.',
                'verbs' => [[
                    'id' => $verb->id,
                    'type' => $verb->type,
                    'verb' => $verb->verb,
                    'meaning' => $verb->meaning,
                    'creator' => auth()->user()->name ?? 'Unknown',
                ]],
            ]);

        } catch (\Throwable $e) {

            \Log::error('Logic Manager Verb Store Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'request' => $request->all(),
            ]);

            /*
            |--------------------------------------------------------------------------
            | AJAX request
            |--------------------------------------------------------------------------
            */

            if ($request->expectsJson() || $request->has('verbs')) {

                return response()->json([
                    'success' => false,
                    'message' => 'Unable to save the new verbs.',
                    'error' => $e->getMessage(),
                ], 500);
            }

            /*
            |--------------------------------------------------------------------------
            | Normal browser request
            |--------------------------------------------------------------------------
            */

            return back()->with(
                'error',
                'Unable to save verb: ' . $e->getMessage()
            );
        }
    }

    public function updateVerb(Request $request, $id)
    {
        try {

            $request->validate([
                'type' => 'required|string|max:255',
                'verb' => 'required|string|max:255',
                'meaning' => 'nullable|string|max:1000',
            ]);

            $verb = Verb::find($id);

            if (!$verb) {

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Verb not found.'
                    ], 404);
                }

                return back()->with('error', 'Verb not found.');
            }

            $verb->update([
                'type' => $request->type,
                'verb' => $request->verb,
                'meaning' => $request->meaning,
            ]);

            /*
            |--------------------------------------------------------------------------
            | AJAX request
            |--------------------------------------------------------------------------
            */

            if ($request->expectsJson()) {

                return response()->json([
                    'success' => true,
                    'message' => 'Verb updated successfully.',
                    'verb' => [
                        'id' => $verb->id,
                        'type' => $verb->type,
                        'verb' => $verb->verb,
                        'meaning' => $verb->meaning,
                        'creator' => optional($verb->user)->name
                            ?? optional(auth()->user())->name
                            ?? 'Unknown',
                    ],
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Normal form request
            |--------------------------------------------------------------------------
            */

            return back()->with(
                'success',
                'Verb updated successfully.'
            );

        } catch (\Throwable $e) {

            \Log::error('Logic Manager Verb Update Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'verb_id' => $id,
                'request' => $request->all(),
            ]);

            if ($request->expectsJson()) {

                return response()->json([
                    'success' => false,
                    'message' => 'Unable to update verb.',
                    'error' => $e->getMessage(),
                ], 500);
            }

            return back()->with(
                'error',
                'Unable to update verb: ' . $e->getMessage()
            );
        }
    }


    public function destroyVerb(Request $request, $id)
    {
        try {

            $verb = Verb::find($id);

            if (!$verb) {

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Logic not found.'
                    ], 404);
                }

                return back()->with(
                    'error',
                    'Logic not found.'
                );
            }

            $verb->delete();

            /*
            |--------------------------------------------------------------------------
            | AJAX request
            |--------------------------------------------------------------------------
            */

            if ($request->expectsJson()) {

                return response()->json([
                    'success' => true,
                    'message' => 'Logic deleted successfully.',
                    'id' => $id,
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Normal form request
            |--------------------------------------------------------------------------
            */

            return back()->with(
                'success',
                'Logic deleted successfully.'
            );

        } catch (\Throwable $e) {

            \Log::error('Logic Manager Verb Delete Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'verb_id' => $id,
            ]);

            if ($request->expectsJson()) {

                return response()->json([
                    'success' => false,
                    'message' => 'Unable to delete logic.',
                    'error' => $e->getMessage(),
                ], 500);
            }

            return back()->with(
                'error',
                'Unable to delete logic: ' . $e->getMessage()
            );
        }
    }

    public function indexVerb()
    {
        $verbs = Verb::all();
        return view('admin.logic-manager.index', compact('verbs'));
    }
}
