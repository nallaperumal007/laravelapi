<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function index()
    {
        return response()->json(Note::all(), 200);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'body' => 'nullable|string',
            'is_done' => 'boolean'
        ]);

        $note = Note::create($validated);
        return response()->json($note, 201);
    }


    public function show(Note $note)
    {
        return response()->json($note, 200);
    }

  
    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:100',
            'body' => 'nullable|string',
            'is_done' => 'boolean'
        ]);

        $note->update($validated);
        return response()->json($note, 200);
    }


    public function destroy(Note $note)
    {
        $note->delete();
        return response()->json(['message' => 'Note deleted successfully'], 200);
    }
}
