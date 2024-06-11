<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affictation extends Model
{
    use HasFactory;
    protected $fillable = [
        'Prof_id',
        'description',  
        'filiers_id',
        'Modul_id',
        'semestre',
    ];

    public function filieres()
    {
        return $this->belongsTo('App\Models\filieres', 'filiers_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'Prof_id');
    }

    public function Modele()
    {
        return $this->belongsTo('App\Models\Module', 'Modul_id');
    }


}
