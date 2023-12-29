<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentCourse extends Model
{
    use HasFactory;

    public function students(){
        return $this->belongsTo(student::class)->withDefault();
    }

    public function programmes(){
        return $this->belongsTo(programme::class)-withDefault();
    }
}
