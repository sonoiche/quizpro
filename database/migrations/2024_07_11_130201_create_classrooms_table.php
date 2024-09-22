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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->integer('instructor_id');
            $table->string('name');
            $table->string('section')->nullable();
            $table->string('subject')->nullable();
            $table->string('subject_code', 20)->nullable();
            $table->string('schedule')->nullable();
            $table->time('schedule_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
