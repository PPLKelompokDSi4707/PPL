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
        Schema::table('destinations', function (Blueprint $table) {
            $table->string('category')->nullable()->comment('darat atau laut');
            $table->string('environment_status')->nullable()->comment('aman, waspada, atau bahaya');
            $table->string('bmkg_adm4')->nullable()->comment('Kode wilayah tingkat 4 BMKG');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            //
        });
    }
};
