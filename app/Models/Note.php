<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'notes';
    protected $fillable = [
        'note1_quarter',
        'note2_quarter',
        'note3_quarter',
        'average',
        'student_id',
        'discipline_id',
        'course_id',
    ];
}
