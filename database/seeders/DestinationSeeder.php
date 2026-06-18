<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Destination;
use App\Models\MapLayer;
use App\Models\User;
use App\Models\BiotaData; // Pastikan untuk import model ini

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destinations = [
            // --- BALI & NUSA TENGGARA ---
            [
                'destination' => [
                    'name' => 'Pantai Pandawa',
                    'description' => 'Pantai berpasir putih yang tersembunyi di balik tebing kapur megah di selatan Bali.',
                    'location' => 'Badung, Bali',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -8.8446,
                    'lng' => 115.1868,
                    'bmkg_adm4' => '51.03.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4'
                ],
                'biota' => [
                    'coral_reef_status' => 'baik', 'coral_coverage_pct' => 75.0, 'fish_diversity' => 'sedang',
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'sedang', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Pandan Laut, Kelapa', 'fauna_highlight' => 'Ikan Sersan Mayor, Bulu Babi', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Nusa Penida',
                    'description' => 'Pulau eksotis dengan tebing ikonik berbentuk kelingking dan perairan jernih habitat Manta Ray.',
                    'location' => 'Klungkung, Bali',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -8.7321,
                    'lng' => 115.5417,
                    'bmkg_adm4' => '51.05.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1501179691627-eeaa65ea017c'
                ],
                'biota' => [
                    'coral_reef_status' => 'sangat_baik', 'coral_coverage_pct' => 88.2, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'sedang', 'seagrass_status' => 'jarang', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Cemara Laut', 'fauna_highlight' => 'Mari Pari (Manta), Ikan Mola-Mola', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Taman Nasional Komodo',
                    'description' => 'Habitat asli kadal purba terbesar di dunia, Komodo, dikelilingi lanskap savana dan perairan kaya nutrisi.',
                    'location' => 'Manggarai Barat, NTT',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -8.5241,
                    'lng' => 119.4975,
                    'bmkg_adm4' => '53.15.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1516690561799-46d8f74f9abf'
                ],
                'biota' => [
                    'coral_reef_status' => 'sangat_baik', 'coral_coverage_pct' => 91.5, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'lebat', 'seagrass_status' => 'lebat', 'forest_cover_pct' => 40.0,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Pohon Lontar, Bakau', 'fauna_highlight' => 'Komodo, Rusa Timor, Hiu Karang', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Gili Trawangan',
                    'description' => 'Pulau bebas kendaraan bermotor yang terkenal dengan pesta pantai, konservasi penyu, dan tempat menyelam indah.',
                    'location' => 'Lombok Utara, NTB',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -8.3512,
                    'lng' => 116.0394,
                    'bmkg_adm4' => '52.08.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1583212292454-1fe6229603b7'
                ],
                'biota' => [
                    'coral_reef_status' => 'sedang', 'coral_coverage_pct' => 55.4, 'fish_diversity' => 'sedang',
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'lebat', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Waru Laut', 'fauna_highlight' => 'Penyu Hijau, Ikan Badut (Clownfish)', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Gunung Rinjani',
                    'description' => 'Gunung berapi tertinggi kedua di Indonesia dengan Danau Segara Anak yang memukau di puncaknya.',
                    'location' => 'Lombok Timur, NTB',
                    'category' => 'darat',
                    'environment_status' => 'waspada',
                    'lat' => -8.4111,
                    'lng' => 116.4578,
                    'bmkg_adm4' => '52.03.01.2002',
                    'image_url' => 'https://images.unsplash.com/photo-1621318047043-418049187313'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => 'rendah',
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 78.0,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Bunga Edelweiss, Cemara Gunung', 'fauna_highlight' => 'Monyet Ekor Panjang, Burung Cikukua Tanduk', 'invasive_species' => null
                ]
            ],

            // --- JAWA ---
            [
                'destination' => [
                    'name' => 'Taman Nasional Bromo Tengger Semeru',
                    'description' => 'Lautan pasir luas dengan kaldera aktif yang menawarkan pemandangan matahari terbit paling magis.',
                    'location' => 'Probolinggo, Jawa Timur',
                    'category' => 'darat',
                    'environment_status' => 'waspada',
                    'lat' => -7.9425,
                    'lng' => 112.9530,
                    'bmkg_adm4' => '35.13.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1584810359583-96fc3448beaa'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 62.0,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Edelweiss Jawa, Anggrek Semeru', 'fauna_highlight' => 'Lutung Jawa, Rusa Bawean', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Kawah Ijen',
                    'description' => 'Kawah asam dengan fenomena api biru (Blue Fire) alami yang langka dan penambangan belerang tradisional.',
                    'location' => 'Banyuwangi, Jawa Timur',
                    'category' => 'darat',
                    'environment_status' => 'waspada',
                    'lat' => -8.0581,
                    'lng' => 114.2411,
                    'bmkg_adm4' => '35.10.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1604999333679-b86d54738315'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 50.0,
                    'biodiversity_index' => 'rendah', 'flora_highlight' => 'Pohon Manisrejo, Pakis Kerbau', 'fauna_highlight' => 'Ayam Hutan Merah, Elang Jawa', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Kepulauan Karimunjawa',
                    'description' => 'Cagar alam laut dengan 27 pulau tropis kecil, terumbu karang sehat, dan penangkaran ikan hiu.',
                    'location' => 'Jepara, Jawa Tengah',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -5.8472,
                    'lng' => 110.4392,
                    'bmkg_adm4' => '33.20.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa'
                ],
                'biota' => [
                    'coral_reef_status' => 'baik', 'coral_coverage_pct' => 79.8, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'lebat', 'seagrass_status' => 'lebat', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Dewadaru, Bakau Hitam', 'fauna_highlight' => 'Hiu Karang, Penyu Sisik', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Candi Borobudur',
                    'description' => 'Monumen Buddha terbesar di dunia yang dikelilingi perbukitan Menoreh yang hijau subur.',
                    'location' => 'Magelang, Jawa Tengah',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -7.6079,
                    'lng' => 110.2038,
                    'bmkg_adm4' => '33.08.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1584810359583-96fc3448beaa'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 35.0,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Pohon Bodhi, Kenanga', 'fauna_highlight' => 'Burung Merpati, Tupai Kelapa', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Taman Nasional Ujung Kulon',
                    'description' => 'Situs warisan dunia UNESCO yang menjadi benteng pertahanan terakhir bagi Badak Jawa yang terancam punah.',
                    'location' => 'Pandeglang, Banten',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -6.7483,
                    'lng' => 105.3283,
                    'bmkg_adm4' => '36.01.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1570654230464-9cf6d6f0660f'
                ],
                'biota' => [
                    'coral_reef_status' => 'sedang', 'coral_coverage_pct' => 48.0, 'fish_diversity' => 'sedang',
                    'mangrove_status' => 'lebat', 'seagrass_status' => 'sedang', 'forest_cover_pct' => 90.0,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Merbau, Palem Palah', 'fauna_highlight' => 'Badak Jawa, Owa Jawa, Banteng', 'invasive_species' => null
                ]
            ],

            // --- SUMATERA ---
            [
                'destination' => [
                    'name' => 'Danau Toba',
                    'description' => 'Danau vulkanik raksasa dengan Pulau Samosir di tengahnya, kaya akan budaya Batak.',
                    'location' => 'Toba, Sumatera Utara',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => 2.6145,
                    'lng' => 98.6744,
                    'bmkg_adm4' => '12.12.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1626128666428-45c16824637f'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => 'sedang',
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 55.0,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Pinus Sumatra, Sampinur', 'fauna_highlight' => 'Ikan Mas, Burung Elang Bondol', 'invasive_species' => 'Enceng Gondok'
                ]
            ],
            [
                'destination' => [
                    'name' => 'Pulau Weh',
                    'description' => 'Titik paling barat Indonesia dengan ekosistem laut yang luar biasa and air laut bening kristal.',
                    'location' => 'Sabang, Aceh',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => 5.8239,
                    'lng' => 95.3181,
                    'bmkg_adm4' => '11.72.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1590523277543-a94d2e4eb00b'
                ],
                'biota' => [
                    'coral_reef_status' => 'sangat_baik', 'coral_coverage_pct' => 89.0, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'jarang', 'seagrass_status' => 'sedang', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Ketapang, Kelapa', 'fauna_highlight' => 'Hiu Tikus, Pari Elang, Gurita', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Kepulauan Mentawai',
                    'description' => 'Surga selancar kelas dunia dengan ombak legendaris dan suku asli yang menjaga tradisi tato kuno.',
                    'location' => 'Kepulauan Mentawai, Sumatera Barat',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -2.1227,
                    'lng' => 99.6014,
                    'bmkg_adm4' => '13.09.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1502680390469-be75c86b636f'
                ],
                'biota' => [
                    'coral_reef_status' => 'baik', 'coral_coverage_pct' => 72.1, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'lebat', 'seagrass_status' => 'sedang', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Bakau, Sagu', 'fauna_highlight' => 'Siamang Mentawai, Penyu Belimbing', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Taman Nasional Gunung Leuser',
                    'description' => 'Salah satu laboratorium alam terbesar di dunia dan rumah perlindungan bagi Orangutan Sumatera.',
                    'location' => 'Langkat, Sumatera Utara',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => 3.7925,
                    'lng' => 97.2341,
                    'bmkg_adm4' => '12.05.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 95.0,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Rafflesia Arnoldii, Kantong Semar', 'fauna_highlight' => 'Orangutan Sumatera, Harimau Sumatera, Gajah', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Pulau Belitung',
                    'description' => 'Pantai unik yang dihiasi formasi batuan granit raksasa berumur ratusan juta tahun.',
                    'location' => 'Belitung, Bangka Belitung',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -2.7176,
                    'lng' => 107.6322,
                    'bmkg_adm4' => '19.02.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e'
                ],
                'biota' => [
                    'coral_reef_status' => 'baik', 'coral_coverage_pct' => 68.5, 'fish_diversity' => 'sedang',
                    'mangrove_status' => 'sedang', 'seagrass_status' => 'lebat', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Pohon Keramunting', 'fauna_highlight' => 'Tarsius Belitung, Kepiting Bakau', 'invasive_species' => null
                ]
            ],

            // --- KALIMANTAN ---
            [
                'destination' => [
                    'name' => 'Taman Nasional Tanjung Puting',
                    'description' => 'Pusat konservasi Orangutan terbesar di dunia menyusuri sungai dengan kapal klotok tradisional.',
                    'location' => 'Kotawaringin Barat, Kalteng',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -3.0494,
                    'lng' => 111.9367,
                    'bmkg_adm4' => '62.01.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1581888227599-779811939961'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'sedang', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 88.0,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Pohon Ulin, Kantong Semar', 'fauna_highlight' => 'Orangutan Kalimantan, Bekantan, Buaya Muara', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Kepulauan Derawan',
                    'description' => 'Habitat bagi ubur-ubur tanpa sengat di Danau Kakaban dan pantai tempat bertelurnya penyu raksasa.',
                    'location' => 'Berau, Kalimantan Timur',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => 2.2472,
                    'lng' => 118.2325,
                    'bmkg_adm4' => '64.03.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5'
                ],
                'biota' => [
                    'coral_reef_status' => 'sangat_baik', 'coral_coverage_pct' => 92.0, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'lebat', 'seagrass_status' => 'lebat', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Bakau Merah', 'fauna_highlight' => 'Ubur-ubur Emas, Penyu Hijau, Pari Manta', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Danau Sentarum',
                    'description' => 'Kompleks danau musiman yang menjadi hamparan air luas saat musim hujan dan padang rumput saat kemarau.',
                    'location' => 'Kapuas Hulu, Kalimantan Barat',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => 0.8522,
                    'lng' => 112.1642,
                    'bmkg_adm4' => '61.06.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 70.0,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Kayu Tembesu, Putat', 'fauna_highlight' => 'Ikan Arwana Merah, Buaya Supit', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Pasar Terapung Lok Baintan',
                    'description' => 'Pasar tradisional di atas perairan Sungai Martapura menggunakan perahu jukung sejak zaman Kesultanan Banjar.',
                    'location' => 'Banjar, Kalimantan Selatan',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -3.2986,
                    'lng' => 114.6644,
                    'bmkg_adm4' => '63.03.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => 'sedang',
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 15.0,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Pohon Rumbia, Enceng Gondok', 'fauna_highlight' => 'Ikan Patin, Burung Raja Udang', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Bukit Bangkirai',
                    'description' => 'Kawasan hutan hujan tropis alami dengan jembatan tajuk (canopy bridge) yang tergantung di pohon-pohon purba.',
                    'location' => 'Kutai Kartanegara, Kaltim',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -1.0267,
                    'lng' => 116.8683,
                    'bmkg_adm4' => '64.02.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 92.0,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Pohon Bangkirai, Meranti', 'fauna_highlight' => 'Burung Enggang, Owa Kalimantan', 'invasive_species' => null
                ]
            ],

            // --- SULAWESI ---
            [
                'destination' => [
                    'name' => 'Taman Nasional Bunaken',
                    'description' => 'Dinding karang vertikal bawah laut raksasa dengan keanekaragaman biota laut tropis super tinggi.',
                    'location' => 'Manado, Sulawesi Utara',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => 1.6186,
                    'lng' => 124.7622,
                    'bmkg_adm4' => '71.71.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1546026423-cc4642628d2b'
                ],
                'biota' => [
                    'coral_reef_status' => 'sangat_baik', 'coral_coverage_pct' => 94.1, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'lebat', 'seagrass_status' => 'lebat', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Mangrove Rhizophora', 'fauna_highlight' => 'Ikan Purba Coelacanth, Penyu Sisik', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Tana Toraja',
                    'description' => 'Kawasan dataran tinggi magis dengan arsitektur rumah Tongkonan dan tradisi pemakaman tebing batu purba.',
                    'location' => 'Tana Toraja, Sulawesi Selatan',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -3.0519,
                    'lng' => 119.8317,
                    'bmkg_adm4' => '73.18.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1563294371-ff554f6b2169'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 45.0,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Pohon Cendana, Bambu Petung', 'fauna_highlight' => 'Kerbau Belang (Tedong Bonga)', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Taman Nasional Wakatobi',
                    'description' => 'Salah satu pusat segitiga terumbu karang dunia dengan ratusan spesies karang dan biota laut eksotis.',
                    'location' => 'Wakatobi, Sulawesi Tenggara',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -5.3267,
                    'lng' => 123.5858,
                    'bmkg_adm4' => '74.07.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f'
                ],
                'biota' => [
                    'coral_reef_status' => 'sangat_baik', 'coral_coverage_pct' => 95.0, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'lebat', 'seagrass_status' => 'lebat', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Cemara Pantai', 'fauna_highlight' => 'Lumba-lumba, Ikan Napoleon, Kima Raksasa', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Kepulauan Togean',
                    'description' => 'Kepulauan terpencil di Teluk Tomini yang menawarkan ketenangan mutlak dan danau ubur-ubur unik.',
                    'location' => 'Tojo Una-Una, Sulawesi Tengah',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -0.4125,
                    'lng' => 121.8481,
                    'bmkg_adm4' => '72.09.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1519046904884-53103b34b206'
                ],
                'biota' => [
                    'coral_reef_status' => 'baik', 'coral_coverage_pct' => 84.0, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'sedang', 'seagrass_status' => 'sedang', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Bakau', 'fauna_highlight' => 'Dugong, Kepiting Kenari, Ubur-ubur', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Taman Nasional Bantimurung',
                    'description' => 'Lembah karst megah yang dijuluki "The Kingdom of Butterfly" oleh Alfred Russel Wallace karena jutaan kupunya.',
                    'location' => 'Maros, Sulawesi Selatan',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -5.0131,
                    'lng' => 119.6844,
                    'bmkg_adm4' => '73.09.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1473448912268-2022ce9509d8'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 75.0,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Pohon Beringin, Aren', 'fauna_highlight' => 'Kupu-kupu Endemik, Kuskus Sulawesi', 'invasive_species' => null
                ]
            ],

            // --- MALUKU & PAPUA ---
            [
                'destination' => [
                    'name' => 'Raja Ampat',
                    'description' => 'Episentrum keanekaragaman hayati laut dunia dengan formasi gugusan pulau karang berbentuk gundukan.',
                    'location' => 'Raja Ampat, Papua Barat Daya',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -0.2306,
                    'lng' => 130.5156,
                    'bmkg_adm4' => '92.05.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb'
                ],
                'biota' => [
                    'coral_reef_status' => 'sangat_baik', 'coral_coverage_pct' => 97.4, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'lebat', 'seagrass_status' => 'lebat', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Anggrek Hitam Papua', 'fauna_highlight' => 'Hiu Berjalan (Wobbegong), Pari Manta, Burung Cendrawasih', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Lembah Baliem',
                    'description' => 'Lembah megah di pegunungan Jayawijaya, rumah bagi suku Dani, Yali, dan Lani yang masih sangat tradisional.',
                    'location' => 'Jayawijaya, Papua Pegunungan',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -4.0942,
                    'lng' => 138.9481,
                    'bmkg_adm4' => '95.01.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 82.0,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Pohon Araucaria, Buah Merah', 'fauna_highlight' => 'Kuskus, Burung Kasuari', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Kepulauan Banda Neira',
                    'description' => 'Pusat jalur rempah dunia masa kolonial dengan pemandangan gunung api bawah laut dan benteng bersejarah.',
                    'location' => 'Maluku Tengah, Maluku',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -4.5261,
                    'lng' => 129.8967,
                    'bmkg_adm4' => '81.01.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa'
                ],
                'biota' => [
                    'coral_reef_status' => 'sangat_baik', 'coral_coverage_pct' => 91.0, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'jarang', 'seagrass_status' => 'sedang', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Pohon Pala, Kenari Banda', 'fauna_highlight' => 'Mandarin Fish, Hiu Martil', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Pantai Ora',
                    'description' => 'Surga tersembunyi berjuluk Maladewa-nya Indonesia dengan resort panggung di atas air laut super jernih.',
                    'location' => 'Maluku Tengah, Maluku',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -2.9036,
                    'lng' => 129.2128,
                    'bmkg_adm4' => '81.01.02.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1439066615861-d1af74d74000'
                ],
                'biota' => [
                    'coral_reef_status' => 'sangat_baik', 'coral_coverage_pct' => 88.5, 'fish_diversity' => 'tinggi',
                    'mangrove_status' => 'sedang', 'seagrass_status' => 'sedang', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Pohon Sagu', 'fauna_highlight' => 'Kakatua Seram, Kima, Ikan Kerapu', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Taman Nasional Lorentz',
                    'description' => 'Taman nasional terbesar di Asia Tenggara dengan ekosistem terlengkap, dari mangrove hingga puncak salju abadi.',
                    'location' => 'Mimika, Papua Tengah',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -4.7533,
                    'lng' => 137.8469,
                    'bmkg_adm4' => '94.04.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'lebat', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 96.0,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Nothofagus (Pohon Fagaceae)', 'fauna_highlight' => 'Kanguru Pohon, Burung Puyuh Salju', 'invasive_species' => null
                ]
            ],

            // --- DESTINASI TAMBAHAN ---
            [
                'destination' => [
                    'name' => 'Pantai Kuta',
                    'description' => 'Pantai matahari terbenam paling ikonik dan pusat hiburan utama bagi wisatawan mancanegara di Bali.',
                    'location' => 'Badung, Bali',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -8.7172,
                    'lng' => 115.1686,
                    'bmkg_adm4' => '51.03.01.2002',
                    'image_url' => 'https://images.unsplash.com/photo-1505118380757-91f5f5632de0'
                ],
                'biota' => [
                    'coral_reef_status' => 'rusak', 'coral_coverage_pct' => 12.5, 'fish_diversity' => 'rendah',
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'jarang', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'rendah', 'flora_highlight' => 'Waru Pantai', 'fauna_highlight' => 'Kepiting Pasir', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Tanah Lot',
                    'description' => 'Pura suci Hindu yang berdiri megah di atas batu karang besar di tengah deburan ombak laut selatan.',
                    'location' => 'Tabanan, Bali',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -8.6212,
                    'lng' => 115.0868,
                    'bmkg_adm4' => '51.02.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1542640244-7e672d6cef4e'
                ],
                'biota' => [
                    'coral_reef_status' => 'sedang', 'coral_coverage_pct' => 35.0, 'fish_diversity' => 'sedang',
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Rumput Laut, Kelapa', 'fauna_highlight' => 'Ular Suci Tanah Lot (Ular Laut Belang)', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Gunung Merapi',
                    'description' => 'Salah satu gunung api paling aktif di dunia, terkenal dengan wisata petualangan lava tour-nya.',
                    'location' => 'Sleman, DI Yogyakarta',
                    'category' => 'darat',
                    'environment_status' => 'waspada',
                    'lat' => -7.5407,
                    'lng' => 110.4457,
                    'bmkg_adm4' => '34.04.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1627664813834-586fa475c404'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 42.0,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Acasia Decurrens, Anggrek Vanda Tricolor', 'fauna_highlight' => 'Elang Jawa, Macan Tutul Jawa', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Pantai Parangtritis',
                    'description' => 'Pantai mistis dengan gumuk pasir yang luas dan ombak pantai selatan yang menggulung megah.',
                    'location' => 'Bantul, DI Yogyakarta',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -8.0245,
                    'lng' => 110.3312,
                    'bmkg_adm4' => '34.02.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => 'rendah',
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'rendah', 'flora_highlight' => 'Pandan Laut, Cemara Udang', 'fauna_highlight' => 'Undur-undur Laut', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Dataran Tinggi Dieng',
                    'description' => 'Kawasan vulkanik aktif di atas awan yang menyajikan telaga warna-warni dan candi-candi hindu kuno.',
                    'location' => 'Wonosobo, Jawa Tengah',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -7.2111,
                    'lng' => 109.9194,
                    'bmkg_adm4' => '33.07.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 30.0,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Purwaceng, Carica', 'fauna_highlight' => 'Katak Dieng, Burung Trucukan', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Pantai Pangandaran',
                    'description' => 'Destinasi wisata pantai andalan Jawa Barat yang memiliki cagar alam hutan di tanjung petanya.',
                    'location' => 'Pangandaran, Jawa Barat',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -7.7019,
                    'lng' => 108.4958,
                    'bmkg_adm4' => '32.18.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e'
                ],
                'biota' => [
                    'coral_reef_status' => 'sedang', 'coral_coverage_pct' => 45.0, 'fish_diversity' => 'sedang',
                    'mangrove_status' => 'sedang', 'seagrass_status' => 'jarang', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Pohon Ketapang', 'fauna_highlight' => 'Rusa Jawa, Monyet Ekor Panjang', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Kawah Putih',
                    'description' => 'Danau kawah belerang berwarna putih kehijauan yang dramatis di daerah pegunungan Ciwidey.',
                    'location' => 'Bandung, Jawa Barat',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -7.1662,
                    'lng' => 107.4022,
                    'bmkg_adm4' => '32.04.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1604999333679-b86d54738315'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 48.0,
                    'biodiversity_index' => 'rendah', 'flora_highlight' => 'Pohon Cantigi, Ki Hujan', 'fauna_highlight' => 'Burung Isap Madu', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Green Canyon (Cukang Taneuh)',
                    'description' => 'Aliran sungai jernih berwarna hijau toska yang membelah tebing batu lumut eksotis.',
                    'location' => 'Pangandaran, Jawa Barat',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -7.7342,
                    'lng' => 108.4214,
                    'bmkg_adm4' => '32.18.01.2003',
                    'image_url' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => 'sedang',
                    'mangrove_status' => 'tidak_ada', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 60.0,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Pohon Jati, Pakis Sarang Burung', 'fauna_highlight' => 'Ikan Mujaer, Biawak Air', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Pantai Tanjung Tinggi',
                    'description' => 'Pantai Laskar Pelangi dengan tumpukan batu granit bundar berukuran raksasa yang menawan.',
                    'location' => 'Belitung, Bangka Belitung',
                    'category' => 'laut',
                    'environment_status' => 'aman',
                    'lat' => -2.5714,
                    'lng' => 107.6719,
                    'bmkg_adm4' => '19.02.02.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1519046904884-53103b34b206'
                ],
                'biota' => [
                    'coral_reef_status' => 'baik', 'coral_coverage_pct' => 70.0, 'fish_diversity' => 'sedang',
                    'mangrove_status' => 'jarang', 'seagrass_status' => 'sedang', 'forest_cover_pct' => null,
                    'biodiversity_index' => 'sedang', 'flora_highlight' => 'Ketapang, Kelapa', 'fauna_highlight' => 'Sotong, Ikan Teri', 'invasive_species' => null
                ]
            ],
            [
                'destination' => [
                    'name' => 'Taman Nasional Way Kambas',
                    'description' => 'Pusat suaka perlindungan, pelatihan, dan konservasi Gajah Sumatera yang legendaris.',
                    'location' => 'Lampung Timur, Lampung',
                    'category' => 'darat',
                    'environment_status' => 'aman',
                    'lat' => -5.1321,
                    'lng' => 105.7878,
                    'bmkg_adm4' => '18.07.01.2001',
                    'image_url' => 'https://images.unsplash.com/photo-1581888227599-779811939961'
                ],
                'biota' => [
                    'coral_reef_status' => null, 'coral_coverage_pct' => null, 'fish_diversity' => null,
                    'mangrove_status' => 'sedang', 'seagrass_status' => 'tidak_ada', 'forest_cover_pct' => 80.0,
                    'biodiversity_index' => 'tinggi', 'flora_highlight' => 'Pohon Meranti, Alang-alang', 'fauna_highlight' => 'Gajah Sumatera, Badak Sumatera, Tapir', 'invasive_species' => null
                ]
            ]
        ];

        // Dapatkan atau buat user untuk created_by pada map layer
        $user = User::firstOrCreate(
            ['email' => 'admin@greentour.test'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );

        // Looping untuk menyimpan data ke database
        foreach ($destinations as $data) {
            // 1. Buat Destinasi
            $destination = Destination::create($data['destination']);

            // 2. Buat Biota Data terkait
            $biotaData = $data['biota'];
            $biotaData['destination_id'] = $destination->id;
            BiotaData::create($biotaData);

            // 3. Buat Layer Peta (Marker) otomatis dari lat/lng destinasi
            MapLayer::create([
                'destination_id' => $destination->id,
                'name' => 'Titik Pusat ' . $destination->name,
                'description' => 'Lokasi utama kedatangan wisatawan ke ' . $destination->name . '.',
                'layer_type' => 'marker',
                'area_type' => 'kawasan_wisata',
                'coordinates' => json_encode(['lat' => $destination->lat, 'lng' => $destination->lng]),
                'is_visible' => true,
                'created_by' => $user->id
            ]);
        }
    }
}