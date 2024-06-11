<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',  
        'filiere_id',
    ];
    public function filiere()
    {
    return $this->belongsTo(filieres::class);
    }

    public function Affictation()
    {
        return $this->hasMany('App\Models\Affictation', 'Modul_id');
    }
}

