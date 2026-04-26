<?php
// 2026_04_26_000005_create_weather_forecasts_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Poin 2 (SDG 13) & Poin 5: historis + prediksi cuaca
        // Seperti aplikasi cuaca — 7 hari ke belakang dan 7 hari ke depan
        Schema::create('weather_forecasts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained('destinations')->cascadeOnDelete();

            // 'historis' = data masa lalu, 'prediksi' = ke depan
            $table->enum('forecast_type', ['historis', 'prediksi']);
            $table->date('forecast_date')->comment('Tanggal data cuaca');
            $table->unsignedTinyInteger('forecast_hour')->nullable()
                  ->comment('Jam 0-23; NULL = agregat harian');

            // Data cuaca
            $table->string('condition', 100);
            $table->float('temperature_min')->nullable()->comment('°C');
            $table->float('temperature_max')->nullable()->comment('°C');
            $table->float('temperature_avg')->nullable()->comment('°C');
            $table->float('humidity')->nullable()->comment('%');
            $table->float('wind_speed')->nullable()->comment('km/h');
            $table->string('wind_direction', 10)->nullable()->comment('N/NE/E/SE/S/SW/W/NW');
            $table->float('rainfall_mm')->nullable()->comment('Curah hujan mm');
            $table->unsignedTinyInteger('uv_index')->nullable()->comment('UV Index 0-11+');
            $table->float('visibility_km')->nullable();

            // Khusus destinasi laut
            $table->float('wave_height_m')->nullable()->comment('Tinggi gelombang (m)');

            // Metadata prediksi
            $table->unsignedTinyInteger('confidence_pct')->nullable()
                  ->comment('Tingkat keyakinan prediksi %');

            // Poin 5: sumber API
            $table->string('data_source', 100)->nullable()
                  ->comment('BMKG | OpenWeatherMap | Open-Meteo');
            $table->timestamp('fetched_at')->useCurrent();

            // Index untuk query cepat dashboard cuaca
            $table->index(['destination_id', 'forecast_date']);
            $table->index(['forecast_type', 'forecast_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('weather_forecasts');
    }
};
