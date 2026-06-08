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
        $table->string('nis')->unique();
        $table->string('name');
        $table->enum('gender', ['male', 'female']);
        $table->date('birth_date')->nullable();
        $table->string('birth_place')->nullable();
        $table->text('address')->nullable();
        $table->string('class_name')->nullable();
        $table->string('dormitory')->nullable();
        $table->string('guardian_name')->nullable();
        $table->string('guardian_phone')->nullable();
        $table->string('photo')->nullable();
        $table->enum('status', ['active', 'alumni', 'inactive'])->default('active');
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
