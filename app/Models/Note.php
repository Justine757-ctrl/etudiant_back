<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'matiere', 'note'];

    // Une note appartient à un étudiant
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}