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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('matriculation_number')->unique(); // Added matriculation number column
            $table->string('birth_certificate')->nullable();
            $table->string('waec_certificate')->nullable();
            $table->string('jamb_registration_number')->nullable();
            $table->string('jamb_score')->nullable();
            $table->year('admission_year')->nullable();
            $table->year('expected_year_of_graduation')->nullable();
            $table->string('picture')->nullable(); // Added picture column
            $table->string('department')->nullable();
            $table->string('level')->nullable();
            $table->string('faculty')->nullable();
            $table->decimal('cgpa', 4, 2)->nullable(); // CGPA with precision
            $table->string('hod_name')->nullable(); // Added HOD name column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
