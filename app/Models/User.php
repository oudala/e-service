<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

        protected $fillable=[
        'FirstName',
        'LastName',
        'email',    
        'CNI',
        'password',
        'Rolee',
        'BoolNote',
        'filiere_id',
        'department_id',
        'phone_number',
        'address',
    ];
    protected $dates = ['deleted_at'];

    public function filier()
    {
        return $this->belongsTo(filieres::class, 'filiere_id');
    }
    public function Affictation()
    {
        return $this->hasMany('App\Models\Affictation', 'Prof_id');
    }
    public function departement()
    {
        return $this->belongsTo(Departement::class, 'department_id');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
