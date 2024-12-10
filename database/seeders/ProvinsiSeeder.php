<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provinsi;

class ProvinsiSeeder extends Seeder
{
    public function run()
    {
        $provinsis = [
            'Jawa Barat',
            'Jawa Tengah',
            'Jawa Timur',
            'Bali',
            'Nusa Tenggara Barat',
            'Nusa Tenggara Timur',
            'Kalimantan Barat',
            'Kalimantan Tengah',
            'Kalimantan Selatan',
            'Kalimantan Timur',
            'Sulawesi Utara',
            'Sulawesi Tengah',
            'Sulawesi Selatan',
            'Sulawesi Tenggara',
            'Maluku',
            'Maluku Utara',
            'Papua',
            'Papua Barat',
            'DKI Jakarta',
            'Banten',
            'Yogyakarta',
        ];

        foreach ($provinsis as $provinsi) {
            Provinsi::create(['nama' => $provinsi]);
        }
    }
}
