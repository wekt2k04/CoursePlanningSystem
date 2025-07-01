<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Affiche une liste de tous les étudiants.
     */
    public function index()
    {
        $students = Student::all(); // Récupère tous les étudiants de la base de données
        return view('students.index', compact('students')); // Retourne la vue 'students.index' avec les données
    }

    /**
     * Affiche le formulaire de création d'un nouvel étudiant.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Stocke un nouvel étudiant dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'matricule' => 'required|string|max:255|unique:students,matricule',
            'dateNaissance' => 'required|date',
        ]);

        Student::create($request->all()); // Crée un nouvel étudiant avec les données validées

        return redirect()->route('students.index')->with('success', 'Étudiant créé avec succès !');
    }

    /**
     * Affiche les détails d'un étudiant spécifique.
     */
    public function show(Student $student) // Laravel injecte automatiquement l'étudiant basé sur l'ID dans l'URL
    {
        return view('students.show', compact('student'));
    }

    /**
     * Affiche le formulaire d'édition d'un étudiant existant.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Met à jour un étudiant existant dans la base de données.
     */
    public function update(Request $request, Student $student)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'matricule' => 'required|string|max:255|unique:students,matricule,' . $student->id, // Ignorer l'ID actuel pour l'unicité
            'dateNaissance' => 'required|date',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Étudiant mis à jour avec succès !');
    }

    /**
     * Supprime un étudiant de la base de données.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Étudiant supprimé avec succès !');
    }
}
