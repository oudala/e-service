<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'teacher_id',
        'file_name',
        'prof_number',
    ];
}
