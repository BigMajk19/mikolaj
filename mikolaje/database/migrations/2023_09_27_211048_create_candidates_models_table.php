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
        Schema::create('candidates_models', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_firstname')->nullable();
            $table->string('candidate_lastname')->nullable();
            $table->string('candidate_phone')->nullable();
            $table->string('candidate_email')->nullable();
            $table->string('job_as')->nullable();
            $table->string('location_city')->nullable();
            $table->string('candidate_age')->nullable();
            $table->string('candidate_growth')->nullable();
            $table->string('candidate_weight')->nullable();
            $table->string('cloth_size')->nullable();
            $table->string('exp_with_children')->nullable();
            $table->string('exp_as_santa')->nullable();
            $table->string('drive_license')->nullable();
            $table->string('work_at_xmas')->nullable();
            $table->longText('candidate_description')->nullable();
            $table->string('cv')->nullable();
            $table->string('privacy_policy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates_models');
    }
};
