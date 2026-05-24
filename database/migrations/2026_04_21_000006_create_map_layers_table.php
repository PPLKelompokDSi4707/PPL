<?php
// 2026_04_26_000006_create_map_layers_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Poin 3: GIS — Marker, Polyline (coli line), Polygon
        // Fitur WAJIB di panel admin
        Schema::create('map_layers', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            // Tipe geometri peta
            $table->enum('layer_type', ['marker', 'polyline', 'polygon']);
            $table->text('description')->nullable();

            // Styling visual
            $table->string('color', 20)->default('#2E7D32');
            $table->string('fill_color', 20)->nullable();
            $table->float('fill_opacity')->default(0.30);
            $table->unsignedTinyInteger('stroke_weight')->default(2);

            // Koordinat disimpan JSON — fleksibel untuk semua tipe:
            // marker   → {"lat": -8.5, "lng": 115.2}
            // polyline → [{"lat":..,"lng":..}, ...]
            // polygon  → [{"lat":..,"lng":..}, ..., (titik pertama=terakhir)]
            $table->json('coordinates');

            // Relasi opsional ke destinasi atau provinsi
            $table->foreignId('destination_id')->nullable()
                  ->constrained('destinations')->nullOnDelete();
            $table->unsignedInteger('province_id')->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->nullOnDelete();

            // Klasifikasi area
            $table->enum('area_type', [
                'kawasan_wisata',
                'kawasan_konservasi',
                'zona_bahaya',
                'jalur_tracking',
                'batas_wilayah',
                'zona_snorkeling',
            ])->nullable();

            $table->boolean('is_visible')->default(true);

            // Dibuat oleh admin
            $table->foreignId('created_by')->constrained('users')->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('map_layers');
    }
};
