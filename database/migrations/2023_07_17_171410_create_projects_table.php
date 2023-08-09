<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamp('started_at');
            $table->timestamp('end_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('finished')->default(false); // dali e zavrsen proektot, false po default 
            $table->integer('budget')->default(5000);
            $table->foreignId('client_id')->constrained('clients');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
