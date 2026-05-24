<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Poin 4: provinsi untuk sebaran destinasi se-Indonesia
        Schema::create('provinces', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 100);
            $table->enum('region', [
                'sumatera', 'jawa', 'kalimantan',
                'sulawesi', 'bali_nusatenggara', 'maluku', 'papua'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
