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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programme_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('student_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamps();
        });

        DB::table('student')->insert(
            [
                [
                    'programme_id' => 1,
                    'student_number' => 1,
                    'first_name' => 'Rik',
                    'last_name' => 'Rikken'
                ],
                [
                    'programme_id' => 1,
                    'student_number' => 2,
                    'first_name' => 'Jos',
                    'last_name' => 'Jossen'
                ],
                [
                    'programme_id' => 2,
                    'student_number' => 1,
                    'first_name' => 'Gert',
                    'last_name' => 'Gerten'
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
