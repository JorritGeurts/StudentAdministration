<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('semester');
            $table->timestamps();
        });

        DB::table('student_courses')->insert(
            [
                [
                    'course_id' => 1,
                    'student_id' => 1,
                    'semester' => 1
                ],
                [
                    'course_id' => 1,
                    'student_id' => 2,
                    'semester' => 1
                ],
                [
                    'course_id' => 4,
                    'student_id' => 3,
                    'semester' => 2
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentâ_courses');
    }
};
