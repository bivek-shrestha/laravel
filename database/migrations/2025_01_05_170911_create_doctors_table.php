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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('specialization_id')
                  ->constrained('specializations')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('phone');
            $table->string('image')->nullable();
            $table->string('degree');
            $table->string('year_of_completion');
            $table->string('opd_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
