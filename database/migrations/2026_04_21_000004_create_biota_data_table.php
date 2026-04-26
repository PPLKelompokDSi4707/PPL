<?php
// 2026_04_26_000004_create_biota_data_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Poin 1 & 5: data biota laut, biota darat, flora & fauna
        // Diisi dari API: GBIF, iNaturalist, BRIN, atau admin
        Schema::create('biota_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained('destinations')->cascadeOnDelete();

            // === BIOTA LAUT (SDG 14) ===
            $table->enum('coral_reef_status', [
                'sangat_baik', 'baik', 'sedang', 'rusak', 'kritis'
            ])->nullable();
            $table->decimal('coral_coverage_pct', 5, 2)->nullable()->comment('% tutupan karang');
            $table->enum('fish_diversity', ['tinggi', 'sedang', 'rendah'])->nullable();
            $table->enum('mangrove_status', ['lebat', 'sedang', 'jarang', 'tidak_ada'])->nullable();
            $table->enum('seagrass_status', ['lebat', 'sedang', 'jarang', 'tidak_ada'])->nullable();
            $table->boolean('marine_protected')->default(false);

            // === BIOTA DARAT (SDG 15) ===
            $table->decimal('forest_cover_pct', 5, 2)->nullable()->comment('% tutupan hutan');
            $table->enum('biodiversity_index', ['tinggi', 'sedang', 'rendah'])->nullable();
            $table->boolean('land_protected')->default(false);

            // === FLORA & FAUNA ===
            $table->text('endemic_species')->nullable();
            $table->text('invasive_species')->nullable();
            $table->text('flora_highlight')->nullable();
            $table->text('fauna_highlight')->nullable();

            // Poin 5: sumber API
            $table->string('data_source', 100)->default('manual')
                  ->comment('manual | GBIF | iNaturalist | BRIN');
            $table->string('external_ref_id', 100)->nullable()
                  ->comment('ID referensi di API eksternal');

            $table->foreignId('recorded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('biota_data');
    }
};
