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
        Schema::create('partners', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('partner_name')->nullable();
            $table->string('partner_firstname')->nullable();
            $table->string('partner_lastname')->nullable();
            $table->string('partner_phone')->nullable();
            $table->string('partner_NIP')->nullable();
            $table->string('partner_adress_street')->nullable();
            $table->string('partner_adress_number')->nullable();
            $table->string('partner_adress_flat')->nullable();
            $table->string('partner_zipcode')->nullable();
            $table->string('partner_city')->nullable();
            $table->string('partner_voivodeship')->nullable();
            $table->string('partner_country')->nullable();
            $table->enum('partner_status', ['active', 'notactive'])->default('notactive');
            $table->string('agreement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
