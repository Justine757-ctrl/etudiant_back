<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Obtenir la liste des étudiants avec leur classe et la moyenne de leurs notes[cite: 4]
    public function index()
    {
        $students = Student::with('classe')
            ->withAvg('notes', 'note') // Calcul de la moyenne côté SQL[cite: 4]
            ->get();

        return response()->json($students);
    }

    // Ajouter un nouvel étudiant
    public function store(Request $request)
    {
        $validated = $request->validate([
            'matricule' => 'required|unique:students,matricule',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'sexe' => 'required|in:M,F',
            'date_naissance' => 'required|date',
            'telephone' => 'required|string',
            'adresse' => 'required|string',
            'class_id' => 'required|exists:classes,id',
        ]);

        $student = Student::create($validated);

        return response()->json($student, 201);
    }

    // Afficher un étudiant spécifique avec ses détails[cite: 4]
    public function show(Student $student)
    {
        return response()->json($student->load(['classe', 'notes']));
    }

    // Mettre à jour les informations d'un étudiant
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|string',
            'prenom' => 'sometimes|string',
            'sexe' => 'sometimes|in:M,F',
            'date_naissance' => 'sometimes|date',
            'telephone' => 'sometimes|string',
            'adresse' => 'sometimes|string',
            'class_id' => 'sometimes|exists:classes,id',
        ]);

        $student->update($validated);

        return response()->json($student);
    }

    // Supprimer (soft delete) un étudiant[cite: 4]
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(['message' => 'Étudiant archivé avec succès']);
    }
}