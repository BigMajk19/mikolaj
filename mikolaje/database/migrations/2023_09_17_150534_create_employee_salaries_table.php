<?php

use App\Models\Employee;
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
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employee::class);
            $table->decimal('per_hour_xmas_net',8,2)->default(0);
            $table->decimal('per_hour_xmas_gross',8,2)->default(0);
            $table->decimal('per_hour_notxmas_net',8,2)->default(0);
            $table->decimal('per_hour_notxmas_gross',8,2)->default(0);
            $table->decimal('per_visit_10_net',8,2)->default(0);
            $table->decimal('per_visit_10_gross',8,2)->default(0);
            $table->decimal('per_visit_20_net',8,2)->default(0);
            $table->decimal('per_visit_20_gross',8,2)->default(0);
            $table->decimal('per_visit_30_net',8,2)->default(0);
            $table->decimal('per_visit_30_gross',8,2)->default(0);
            $table->decimal('per_visit_60_net',8,2)->default(0);
            $table->decimal('per_visit_60_gross',8,2)->default(0);
            $table->decimal('per_visit_company_30_net',8,2)->default(0);
            $table->decimal('per_visit_company_30_gross',8,2)->default(0);
            $table->decimal('per_visit_company_60_net',8,2)->default(0);
            $table->decimal('per_visit_company_60_gross',8,2)->default(0);
            $table->decimal('per_disance_net',8,2)->default(0);
            $table->decimal('per_disance_gross',8,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_salaries');
    }
};
