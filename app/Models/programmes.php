<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programmes extends Model
{
    use HasFactory;

    public function studentcourset(){
        return $this->hasMany(student_courses::class);
    }
}
