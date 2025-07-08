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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable()->index();
            $table->string('payer_ref_no')->unique();
            $table->string('payer_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->decimal('amount', 12, 2);
            $table->string('status')->default('INITIATED'); // INITIATED, SUCCESSFUL, FAILED, etc.
            $table->string('payment_url')->nullable();
            $table->string('description')->nullable();
            $table->json('meta_data')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('set null');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
