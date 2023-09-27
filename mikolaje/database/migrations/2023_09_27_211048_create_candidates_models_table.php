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
            $table->string('candidate_firstname');
            $table->string('candidate_lastname');
            $table->string('candidate_phone');
            $table->string('candidate_email');
            $table->string('job_as');
            $table->string('location_city');
            $table->string('candidate_age');
            $table->string('candidate_growth');
            $table->string('candidate_weight');
            $table->string('cloth_size');
            $table->string('exp_with_children');
            $table->string('exp_as_santa');
            $table->string('drive_license');
            $table->string('work_at_xmas');
            $table->longText('candidate_description');
            $table->string('cv');
            $table->string('privacy_policy');
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
