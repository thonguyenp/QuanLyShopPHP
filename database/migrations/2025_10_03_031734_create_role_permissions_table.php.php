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
        //
        Schema::create('role_permissions', function (Blueprint $table) {
            //Tự động tham chiếu đến cột id của bảng role
            //Cascade là nếu 1 dòng bên roles/permissions bị xóa thì trong này cx xóa hết các dòng đó
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            //Tự động tham chiếu đến cột id bảng permission
            $table->foreignId('permission_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('role_permissions');
    }
};
