<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'gender',
        'is_married',
        'profile_image',
        'status',
    ];
}
