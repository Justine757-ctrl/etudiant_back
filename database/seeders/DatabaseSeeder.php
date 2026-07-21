<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classe;
use App\Models\Student;
use App\Models\Note;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Création de deux classes de test
        $classe1 = Classe::create([
            'nom' => 'Licence 2 Génie Logiciel',
            'niveau' => 'L2',
        ]);

        $classe2 = Classe::create([
            'nom' => 'Licence 3 Cybersecurity',
            'niveau' => 'L3',
        ]);

        // 2. Création de deux étudiants de test
        $student1 = Student::create([
            'matricule' => 'ETU-2026-001',
            'nom' => 'KOFFI',
            'prenom' => 'Abla',
            'sexe' => 'F',
            'date_naissance' => '2003-05-14',
            'telephone' => '+22890000001',
            'adresse' => 'Lomé, Togo',
            'class_id' => $classe1->id,
        ]);

        $student2 = Student::create([
            'matricule' => 'ETU-2026-002',
            'nom' => 'AMADOU',
            'prenom' => 'Kossivi',
            'sexe' => 'M',
            'date_naissance' => '2002-11-20',
            'telephone' => '+22890000002',
            'adresse' => 'Lomé, Togo',
            'class_id' => $classe1->id,
        ]);

        // 3. Ajout de notes de test
        Note::create(['student_id' => $student1->id, 'matiere' => 'Développement Web', 'note' => 16.50]);
        Note::create(['student_id' => $student1->id, 'matiere' => 'Base de Données', 'note' => 14.00]);
        Note::create(['student_id' => $student2->id, 'matiere' => 'Développement Web', 'note' => 12.00]);
    }
}