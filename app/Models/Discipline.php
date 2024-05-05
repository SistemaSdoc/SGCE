<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discipline extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'disciplines';
    protected $fillable = [
        'disciplinename',
        'description',
        'user_id',
    ];


}
