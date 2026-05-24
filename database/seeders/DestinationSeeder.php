<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Destination;
use App\Models\MapLayer;
use App\Models\User;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Pastikan ada minimal 1 user untuk 'created_by' pada map_layers
        $user = User::firstOrCreate(
            ['email' => 'admin@greentour.test'],
            [
                'name' => 'Admin Seed',
                'password' => bcrypt('password')
            ]
        );

        // Buat 40 destinasi dummy
        for ($i = 1; $i <= 40; $i++) {
            $isLaut = $faker->boolean(50);
            
            // Generate nama yang sesuai agar FR03 filter darat/laut bisa berfungsi (menggunakan LIKE Pantai/Gunung)
            if ($isLaut) {
                $prefix = $faker->randomElement(['Pantai', 'Pulau', 'Taman Laut', 'Tanjung']);
            } else {
                $prefix = $faker->randomElement(['Gunung', 'Bukit', 'Taman Nasional', 'Hutan', 'Danau']);
            }
            
            $name = $prefix . ' ' . $faker->city;
            
            $destination = Destination::create([
                'name' => $name,
                'location' => $faker->city . ', ' . $faker->state,
            ]);

            // Assign status lingkungan secara random agar FR03 berfungsi
            $areaTypes = ['kawasan_wisata', 'kawasan_konservasi', 'zona_bahaya'];
            $areaType = $faker->randomElement($areaTypes);
            
            // Koordinat acak di Indonesia
            $lat = $faker->randomFloat(4, -10.0, 5.0);
            $lng = $faker->randomFloat(4, 96.0, 140.0);

            MapLayer::create([
                'name' => 'Titik Lokasi ' . $name,
                'layer_type' => 'marker',
                'description' => $faker->paragraph(),
                'coordinates' => ['lat' => $lat, 'lng' => $lng], // Akan di-cast ke JSON oleh Model
                'destination_id' => $destination->id,
                'area_type' => $areaType,
                'is_visible' => true,
                'created_by' => $user->id,
            ]);
        }
    }
}
