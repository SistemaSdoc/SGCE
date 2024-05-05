<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'birthday',
        'email',
        'phonenumber',
        'number_bi',
        'address',
        'fathername',
        'mothername',
        'nationality',
        'province',
        'municipality',
        'street',
        'school_id',
        'course_id',
        'user_id',
];






}
