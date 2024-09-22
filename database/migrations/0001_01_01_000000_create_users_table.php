<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('contact_number')->nullable();
            $table->enum('role', ['Admin', 'Teacher', 'Student'])->nullable();
            $table->string('student_number')->nullable();
            $table->string('section')->nullable();
            $table->string('college_year')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->bigInteger('zip_code')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('register_token')->nullable();
            $table->string('photo')->nullable();
            $table->date('birthdate')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        DB::table('users')->insert([
            ['id' => 1, 'fname' => 'Admin', 'lname' => 'User', 'email' => 'admin@gmail.com', 'password' => bcrypt('12345678'), 'contact_number' => '09071234567', 'role' => 'Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
