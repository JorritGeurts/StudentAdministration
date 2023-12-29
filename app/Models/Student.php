<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    public function studentcourseo(){
        return $this->hasMany(studentCourse::class);
    }
}
