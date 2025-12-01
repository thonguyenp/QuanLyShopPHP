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
        Schema::create('kpi_criteria', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Tiêu chí: "Đi đúng giờ", "Hiệu suất"
            $table->integer('max_score');    // Điểm tối đa của tiêu chí
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpi_criteria');
    }
};
