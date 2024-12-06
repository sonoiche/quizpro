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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('classroom_id');
            $table->bigInteger('items')->nullable()->default(10);
            $table->bigInteger('passing_grade')->nullable();
            $table->integer('test_type')->nullable();
            $table->text('content')->nullable();
            $table->boolean('display_student_score')->nullable()->defautl(false);
            $table->enum('status', ['Published', 'Draft'])->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
