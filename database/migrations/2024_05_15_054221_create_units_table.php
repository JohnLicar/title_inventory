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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('awardee_id')->constrained();
            $table->foreignId('site_id')->constrained();
            $table->string('phase');
            $table->string('block');
            $table->string('lot');
            $table->string('reblocking_phase')->nullable();
            $table->string('reblocking_block')->nullable();
            $table->string('reblocking_lot')->nullable();
            $table->date('date_endorsed')->nullable();
            $table->date('date_released')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
