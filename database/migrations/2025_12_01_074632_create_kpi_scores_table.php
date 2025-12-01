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
        Schema::create('kpi_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');     // Nhân viên được chấm
            $table->unsignedBigInteger('criteria_id'); // Tiêu chí
            $table->unsignedBigInteger('rated_by');    // Người chấm
            $table->integer('score');                  // Điểm chấm trên tiêu chí
            $table->string('period');                  // Thời gian: 2025-11, 2025-Q1
            $table->text('note')->nullable();          // Ghi chú
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('criteria_id')->references('id')->on('kpi_criteria');
            $table->foreign('rated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpi_scores');
    }
};
