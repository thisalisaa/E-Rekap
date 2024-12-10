<?php

// database/seeders/KelurahanSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelurahan;

class KelurahanSeeder extends Seeder
{
    public function run()
    {
        $kelurahans = [
            // Kelurahan untuk Kecamatan Bandung
            ['kecamatan_id' => 1, 'nama' => 'Kelurahan Cihampelas'],
            ['kecamatan_id' => 1, 'nama' => 'Kelurahan Ciwalk'],
            ['kecamatan_id' => 1, 'nama' => 'Kelurahan Dago'],
            ['kecamatan_id' => 1, 'nama' => 'Kelurahan Kebon Kawis'],
            ['kecamatan_id' => 1, 'nama' => 'Kelurahan Setiabudi'],

            // Kelurahan untuk Kecamatan Garut
            ['kecamatan_id' => 2, 'nama' => 'Kelurahan Garut Kota'],
            ['kecamatan_id' => 2, 'nama' => 'Kelurahan Garut Barat'],
            ['kecamatan_id' => 2, 'nama' => 'Kelurahan Garut Timur'],
            ['kecamatan_id' => 2, 'nama' => 'Kelurahan Garut Selatan'],
            ['kecamatan_id' => 2, 'nama' => 'Kelurahan Garut Utara'],

            // Kelurahan untuk Kecamatan Semarang
            ['kecamatan_id' => 3, 'nama' => 'Kelurahan Pandanaran'],
            ['kecamatan_id' => 3, 'nama' => 'Kelurahan Karangtempel'],
            ['kecamatan_id' => 3, 'nama' => 'Kelurahan Kalibanteng'],
            ['kecamatan_id' => 3, 'nama' => 'Kelurahan Sekayu'],
            ['kecamatan_id' => 3, 'nama' => 'Kelurahan Gajahmungkur'],

            // Kelurahan untuk Kecamatan Surabaya
            ['kecamatan_id' => 4, 'nama' => 'Kelurahan Tegalsari'],
            ['kecamatan_id' => 4, 'nama' => 'Kelurahan Sukolilo'],
            ['kecamatan_id' => 4, 'nama' => 'Kelurahan Gubeng'],
            ['kecamatan_id' => 4, 'nama' => 'Kelurahan Wonokromo'],
            ['kecamatan_id' => 4, 'nama' => 'Kelurahan Rungkut'],

            // Kelurahan untuk Kecamatan Denpasar
            ['kecamatan_id' => 5, 'nama' => 'Kelurahan Denpasar Barat'],
            ['kecamatan_id' => 5, 'nama' => 'Kelurahan Denpasar Selatan'],
            ['kecamatan_id' => 5, 'nama' => 'Kelurahan Denpasar Timur'],
            ['kecamatan_id' => 5, 'nama' => 'Kelurahan Denpasar Utara'],
            ['kecamatan_id' => 5, 'nama' => 'Kelurahan Pemecutan'],

            // Kelurahan untuk Kecamatan Mataram
            ['kecamatan_id' => 6, 'nama' => 'Kelurahan Ampenan'],
            ['kecamatan_id' => 6, 'nama' => 'Kelurahan Cakranegara'],
            ['kecamatan_id' => 6, 'nama' => 'Kelurahan Selaparang'],
            ['kecamatan_id' => 6, 'nama' => 'Kelurahan Mataram'],
            ['kecamatan_id' => 6, 'nama' => 'Kelurahan Cakra'],

            // Kelurahan untuk Kecamatan Pontianak
            ['kecamatan_id' => 7, 'nama' => 'Kelurahan Pontianak Kota'],
            ['kecamatan_id' => 7, 'nama' => 'Kelurahan Pontianak Timur'],
            ['kecamatan_id' => 7, 'nama' => 'Kelurahan Pontianak Selatan'],
            ['kecamatan_id' => 7, 'nama' => 'Kelurahan Pontianak Utara'],
            ['kecamatan_id' => 7, 'nama' => 'Kelurahan Pontianak Barat'],

            // Kelurahan untuk Kecamatan Palangkaraya
            ['kecamatan_id' => 8, 'nama' => 'Kelurahan Palangkaraya'],
            ['kecamatan_id' => 8, 'nama' => 'Kelurahan Pahandut'],
            ['kecamatan_id' => 8, 'nama' => 'Kelurahan Bukit Rawi'],
            ['kecamatan_id' => 8, 'nama' => 'Kelurahan Menteng'],
            ['kecamatan_id' => 8, 'nama' => 'Kelurahan Panarung'],

            // Kelurahan untuk Kecamatan Banjarmasin
            ['kecamatan_id' => 9, 'nama' => 'Kelurahan Banjarmasin Tengah'],
            ['kecamatan_id' => 9, 'nama' => 'Kelurahan Banjarmasin Selatan'],
            ['kecamatan_id' => 9, 'nama' => 'Kelurahan Banjarmasin Utara'],
            ['kecamatan_id' => 9, 'nama' => 'Kelurahan Banjarmasin Timur'],
            ['kecamatan_id' => 9, 'nama' => 'Kelurahan Banjarmasin Barat'],

            // Kelurahan untuk Kecamatan Balikpapan
            ['kecamatan_id' => 10, 'nama' => 'Kelurahan Balikpapan Tengah'],
            ['kecamatan_id' => 10, 'nama' => 'Kelurahan Balikpapan Selatan'],
            ['kecamatan_id' => 10, 'nama' => 'Kelurahan Balikpapan Utara'],
            ['kecamatan_id' => 10, 'nama' => 'Kelurahan Balikpapan Timur'],
            ['kecamatan_id' => 10, 'nama' => 'Kelurahan Balikpapan Barat'],
        ];

        foreach ($kelurahans as $kelurahan) {
            Kelurahan::create($kelurahan);
        }
    }
}
