<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Affiche une liste de tous les profs.
     */
    public function index()
    {
        $teachers = Teacher::all(); // Récupère tous les profs de la base de données.
        return view('teachers.index', compact('teachers')); // Retourne la vue 'teachers.index' avec les données
    }

    /**
     * Affiche le formulaire de création d'un nouveu prof.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Stocke un nouveau professeur dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des données 
        $request->validate([
            'nom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
        ]);

        Teacher::create($request->all()); // Crée un nouveau prof avec les données validées

        return redirect()->route('teachers.index')->with('success', 'Professeur créé avec succès !');
    }

    /**
     * Affiche les détails d'un professeur spécifique.
     */
    public function show(Teacher $teacher) // Laravel injecte directement le professeur basé sur l'ID dans l'URL
    {
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Affiches le formulaire d'édition d'un prof existant.
     */
    public function edit(string $id)
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Met à jour un professeur existant dans la base de données.
     */
    public function update(Request $request, Teacher $teacher)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'Professeur mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Professeur supprimé avec succès !');
    }
}
