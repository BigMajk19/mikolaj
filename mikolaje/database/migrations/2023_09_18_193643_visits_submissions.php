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
        Schema::create('visits_submissions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('type_name');
            $table->string('visit_name')->nullable();
            $table->integer('length_visit')->nullable();
            $table->integer('visit_qty')->nullable();
            $table->string('facility_name')->nullable();
            $table->string('client_firstname')->nullable();
            $table->string('client_lastname')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->date('visit_date')->nullable();
            $table->string('preffered_time')->nullable();
            $table->string('interval_hours')->nullable();
            $table->string('guaranted')->default('no');
            $table->float('price_net')->nullable();
            $table->float('price_gross')->nullable();
            $table->longText('additional_information')->nullable();
            $table->text('street_address')->nullable();
            $table->string('street_number')->nullable();
            $table->string('flat_number')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('voivodeship')->nullable();
            $table->string('counties')->nullable();
            $table->string('drive_fee')->nullable();
            $table->string('invoice')->nullable();
            $table->text('invoice_company_name')->nullable();
            $table->string('invoice_NIP')->nullable();
            $table->text('invoice_company_adress')->nullable();
            $table->string('accepted_statue');
            $table->string('accepted_marketing')->nullable();
            $table->string('remind_visit')->nullable();
            $table->string('status')->default('new');
            $table->string('partner')->nullable();
            $table->string('employee')->nullable();
            $table->longText('visit_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
