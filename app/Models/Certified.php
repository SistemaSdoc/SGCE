<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certified extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'certifieds';
    protected $fillable = [
        'date',
        'qrcode',
        'signature',
        'course_id',
        'student_id',
        'note_id',
    ];

}
