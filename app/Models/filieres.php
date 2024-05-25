<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filieres extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',  
        'department_id'
    ];
    public function departement()
    {
        return $this->belongsTo('App\Models\departement', 'department_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'filiere_id');
    }    
    
    public function Affictation()
    {
        return $this->hasMany('App\Models\Affictation', 'filiers_id');
    }
}
