<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;
    protected $fillable=[
        'FirstName',
        'LastName',  
        'user_id',
        'StatutNote',
        '   ',
        'created_by',
    ];
}
