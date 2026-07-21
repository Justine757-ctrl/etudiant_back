<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Student;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Récupérer toutes les notes
    public function index()
    {
        return response()->json(Note::with('student')->get());
    }

    // Ajouter une note à un étudiant
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'matiere'    => 'required|string',
            'note'       => 'required|numeric|min:0|max:20', // Note entre 0 et 20
        ]);

        $note = Note::create($validated);

        return response()->json($note, 201);
    }

    // Modifier une note
    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'matiere' => 'sometimes|string',
            'note'    => 'sometimes|numeric|min:0|max:20',
        ]);

        $note->update($validated);

        return response()->json($note);
    }

    // Supprimer une note
    public function destroy(Note $note)
    {
        $note->delete();

        return response()->json(['message' => 'Note supprimée avec succès']);
    }
}