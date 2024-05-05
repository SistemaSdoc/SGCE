<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseDiscipline extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'course_disciplines';
    protected $fillable = [
        'course_id',
        'discipline_id',
    ];
}
