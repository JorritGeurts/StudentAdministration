<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class course extends Model
{
    use HasFactory;
    public function student_courses()
    {
        return $this->hasMany(studentCourse::class);
    }
    public function programme()
    {
        return $this->belongsTo(programme::class)->withDefault();
    }

    protected function programmeName(): Attribute
    {
        return Attribute::make(
            get: fn($value,$attributes)=> programme::find($attributes['programme_id'])->name,
        );
    }

    protected function studentId(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes)=> studentCourse::where('course_id','like',$this['id'])->get()
        );
    }

    protected function studentName(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes)=> studentCourse::where('course_id','like',$attributes['id'])->with('students')->get()
        );
    }

    protected $fillable = ['name','programme_id','created_at','description'];
    protected $appends = ['programme_name','student_id','student_name'];
}
