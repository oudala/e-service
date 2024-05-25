<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departement extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function filieres()
    {
        return $this->hasMany('App\Models\filieres', 'department_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'department_id');
    }
}

