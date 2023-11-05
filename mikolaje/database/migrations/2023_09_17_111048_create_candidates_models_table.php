<?php

use App\Models\Partners;
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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('candidate_firstname')->nullable();
            $table->string('candidate_lastname')->nullable();
            $table->string('candidate_phone')->nullable();
            $table->string('candidate_email')->nullable();
            $table->string('job_as')->nullable();
            $table->string('candidate_city')->nullable();
            $table->string('candidate_county')->nullable();
            $table->string('candidate_voivodeship')->nullable();
            $table->string('candidate_age')->nullable();
            $table->string('candidate_growth')->nullable();
            $table->string('candidate_weight')->nullable();
            $table->string('cloth_size')->nullable();
            $table->string('exp_with_children')->nullable();
            $table->string('exp_as_santa')->nullable();
            $table->string('drive_license')->nullable();
            $table->string('work_before_xmas')->nullable();
            $table->string('work_at_xmas')->nullable();
            $table->longText('candidate_description')->nullable();
            $table->string('candidate_photo')->nullable();
            $table->string('cv')->nullable();
            $table->string('privacy_policy')->nullable();
            $table->string('hired')->default('no')->nullable();
            $table->foreignIdFor(Partners::class)->default(0);
            $table->string('partner')->nullable();
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
