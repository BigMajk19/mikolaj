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
        Schema::create('visits_names', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('type_name');
            $table->string('visit_name');
            $table->string('visit_length');
            $table->string('visit_price_net');
            $table->string('visit_price_gross');
            $table->string('visit_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits_names');
    }
};
