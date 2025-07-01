<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Affiches la liste de tous les cours.
     */
    public function index()
    {
        $courses = Course::all(); // Récupère tous les cours de la base de données
        return view('courses.index', compact('courses')); // Retourne la vue 'courses.index' avec les données
    }

    /**
     * Affiches le formulaire de création d'un nouveau cours.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Stocke un nouveau cours dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'intitule' => 'required|string|max:255',
            'code' => 'required|string|max:10',
        ]);

        Course::create($request->all()); // Crée un nouveau cours avec les données validées

        return redirect()->route('courses.index')->with('success', 'Cours créé avec succès !');
    }

    /**
     * Affiche les détails d'un cours spécifique.
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Affiche le formulaire d'édition relatif à un cours existant.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Met à jour un cours existant dans la base de données.
     */
    public function update(Request $request, Course $course)
    {
        // Validation des données
        $request->validate([
            'intitule' => 'required|string|max:255',
            'code' => 'required|string|max:10',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Identifiants du cours modifié avec succès !');
    }

    /**
     * Supprimes un cours de la base données.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('succes', 'Cours supprimé avec succès !');
    }
}
