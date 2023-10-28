<?php

use App\Models\Partners;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('employee_firstname')->nullable();
            $table->string('employee_lastname')->nullable();
            $table->string('employee_phone')->nullable();
            $table->string('employee_email')->nullable();
            $table->string('job_as')->nullable();
            $table->string('employee_city')->nullable();
            $table->string('employee_voivodeship')->nullable();
            $table->string('employee_age')->nullable();
            $table->string('employee_growth')->nullable();
            $table->string('employee_weight')->nullable();
            $table->string('cloth_size')->nullable();
            $table->string('drive_license')->nullable();
            $table->string('work_before_xmas')->nullable();
            $table->string('work_at_xmas')->nullable();
            $table->string('payment_net')->nullable();
            $table->string('payment_gross')->nullable();
            $table->longText('notes')->nullable();
            $table->string('parcel_locker')->nullable();
            $table->string('type_agreement')->nullable();
            $table->string('agreement')->nullable();
            $table->string('costium_given')->default('no')->nullable();
            $table->string('costium_taken')->default('no')->nullable();
            $table->enum('employee_status', ['active', 'not_active'])->default('not_active');
            $table->enum('salary', ['per_hour','per_visit'])->default('per_hour');
            $table->float('rating')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->foreignIdFor(Partners::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
