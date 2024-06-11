<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudient_id',
        'Prof_id',
        'Modul_id',        
        'filiers_id',
        'Note',
        'created_by',
        'is_sauvgarde_prof_Exam',
        'is_submitted_prof_Exam',
        'is_submitted_coordinateur_Exam',
    ];
}
