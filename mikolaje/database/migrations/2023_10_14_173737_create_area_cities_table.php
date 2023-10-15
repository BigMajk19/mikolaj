<?php

use App\Models\AreaVoivodeship;
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
        Schema::create('area_cities', function (Blueprint $table) {
            $table->id();
            $table->string('city_name');
            $table->foreignIdFor(AreaVoivodeship::class);
            $table->string('status')->default('not_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_cities');
    }
};
