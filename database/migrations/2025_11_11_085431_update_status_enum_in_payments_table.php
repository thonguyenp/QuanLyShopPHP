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
        // Chỉ MySQL hỗ trợ ALTER ENUM trực tiếp
        DB::statement("ALTER TABLE payments MODIFY COLUMN status ENUM('pending', 'processing', 'completed', 'failed') NOT NULL DEFAULT 'pending'");
    }

    public function down(): void
    {
        // rollback về enum cũ
        DB::statement("ALTER TABLE payments MODIFY COLUMN status ENUM('pending', 'completed', 'failed') NOT NULL DEFAULT 'pending'");
    }
};
