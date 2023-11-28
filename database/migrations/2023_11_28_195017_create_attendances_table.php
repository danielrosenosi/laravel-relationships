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
        Schema::create('attendances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('attendable_id');
            $table->string('attendable_type');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('primary_attendances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('patient_name');
            $table->timestamps();
        });

        Schema::create('secondary_attendances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('patient_age');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
