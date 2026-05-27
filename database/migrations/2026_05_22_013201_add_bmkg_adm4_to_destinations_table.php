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
        if (! Schema::hasTable('destinations') || Schema::hasColumn('destinations', 'bmkg_adm4')) {
            return;
        }

        Schema::table('destinations', function (Blueprint $table) {
            $table->string('bmkg_adm4')->nullable()->comment('Kode wilayah tingkat 4 BMKG');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('destinations') || ! Schema::hasColumn('destinations', 'bmkg_adm4')) {
            return;
        }

        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn('bmkg_adm4');
        });
    }
};
