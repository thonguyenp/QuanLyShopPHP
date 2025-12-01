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
        Schema::create('kpi_bonus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // nhân viên
            $table->year('year');                   // năm
            $table->integer('total_score');         // tổng điểm KPI trong năm
            $table->decimal('bonus_amount', 10, 2); // tiền thưởng
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpi_bonus');
    }
};
