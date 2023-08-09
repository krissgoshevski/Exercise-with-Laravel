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
        Schema::create('bonuses_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('bonus')->unsigned(); // unsigned e koga ne moze da bide negativen broj, da ne e pod 0 
            $table->foreignId('employee_id')->constrained('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonuses_sales');
    }
};
