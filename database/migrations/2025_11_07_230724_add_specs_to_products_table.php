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
        Schema::table('products', function (Blueprint $table) {
            //
            $table->string('gpu')->nullable()->after('description');
            $table->string('cpu')->nullable()->after('gpu');
            $table->string('ram')->nullable()->after('cpu');
            $table->string('rom')->nullable()->after('ram');
            $table->string('connection_port')->nullable()->after('rom');
            $table->string('camera')->nullable()->after('connection_port');
            $table->string('battery')->nullable()->after('camera');
            $table->string('monitor_size')->nullable()->after('battery');
            $table->string('monitor_resolution')->nullable()->after('monitor_size');
            $table->boolean('isArrival')->default(false)->after('monitor_resolution');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
