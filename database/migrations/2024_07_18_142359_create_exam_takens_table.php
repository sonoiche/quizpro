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
        Schema::create('exam_takens', function (Blueprint $table) {
            $table->id();
            $table->string('student_number');
            $table->integer('exam_id');
            $table->integer('question_id');
            $table->text('answer')->nullable();
            $table->enum('status', ['Correct', 'Wrong'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_takens');
    }
};
