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
        Schema::create('programme', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('programme')->insert(
            [
                [
                    'name' => 'IT Factory'
                ],
                [
                    'name' => 'Office Management'
                ],
                [
                    'name' => 'Business and Tourism'
                ],
                [
                    'name' => 'Media and Communication'
                ],
                [
                    'name' => 'People & Health'
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programme');
    }
};
