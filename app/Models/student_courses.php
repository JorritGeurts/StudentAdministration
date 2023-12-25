<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_courses extends Model
{
    use HasFactory;

    public function students(){
        return $this->belongsTo(students::class)->withDefault();
    }

    public function programmes(){
        return $this->belongsTo(programmes::class)-withDefault();
    }
}
