<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\BiotaData;
use Faker\Factory as Faker;

class BiotaDataSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $destinations = Destination::doesntHave('biotaData')->get();

        foreach ($destinations as $dest) {
            $isLaut = str_contains(strtolower($dest->name), 'pantai') || 
                      str_contains(strtolower($dest->name), 'pulau') ||
                      str_contains(strtolower($dest->name), 'tanjung') ||
                      str_contains(strtolower($dest->name), 'laut');
            
            BiotaData::create([
                'destination_id' => $dest->id,
                'coral_reef_status' => $isLaut ? $faker->randomElement(['sangat_baik', 'baik', 'sedang', 'rusak', 'kritis']) : null,
                'coral_coverage_pct' => $isLaut ? $faker->randomFloat(2, 10, 95) : null,
                'fish_diversity' => $isLaut ? $faker->randomElement(['tinggi', 'sedang', 'rendah']) : null,
                'mangrove_status' => $isLaut ? $faker->randomElement(['lebat', 'sedang', 'jarang', 'tidak_ada']) : null,
                'seagrass_status' => $isLaut ? $faker->randomElement(['lebat', 'sedang', 'jarang', 'tidak_ada']) : null,
                'marine_protected' => $isLaut ? $faker->boolean(30) : false,
                
                'forest_cover_pct' => !$isLaut ? $faker->randomFloat(2, 20, 100) : null,
                'biodiversity_index' => !$isLaut ? $faker->randomElement(['tinggi', 'sedang', 'rendah']) : null,
                'land_protected' => !$isLaut ? $faker->boolean(50) : false,
                
                'endemic_species' => $faker->words(2, true),
                'invasive_species' => $faker->boolean(30) ? $faker->word : null,
                'flora_highlight' => $faker->words(2, true),
                'fauna_highlight' => $faker->words(2, true),
                
                'data_source' => 'manual',
            ]);
        }
    }
}
