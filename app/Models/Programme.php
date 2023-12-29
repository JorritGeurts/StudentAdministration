<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programme extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function courses()
    {
        return $this->hasMany(course::class, 'programme_id');
    }
    public function students()
    {
        return $this->hasMany(student::class);
    }

}
