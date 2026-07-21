<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'sexe',
        'date_naissance',
        'telephone',
        'adresse',
        'class_id'
    ];

    // Un étudiant appartient à une classe
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }

    // Un étudiant a plusieurs notes
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}