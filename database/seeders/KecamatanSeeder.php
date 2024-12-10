<?php

// database/seeders/KecamatanSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kecamatan;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        $kecamatans = [
            ['kabupaten_id' => 1, 'nama' => 'Kecamatan Bandung'],
            ['kabupaten_id' => 1, 'nama' => 'Kecamatan Cibeunying'],
            ['kabupaten_id' => 2, 'nama' => 'Kecamatan Garut Kota'],
            ['kabupaten_id' => 2, 'nama' => 'Kecamatan Tarogong'],
            ['kabupaten_id' => 3, 'nama' => 'Kecamatan Surabaya Kota'],
            ['kabupaten_id' => 3, 'nama' => 'Kecamatan Wonokromo'],
            ['kabupaten_id' => 4, 'nama' => 'Kecamatan Denpasar Barat'],
            ['kabupaten_id' => 4, 'nama' => 'Kecamatan Denpasar Timur'],
            ['kabupaten_id' => 5, 'nama' => 'Kecamatan Mataram Barat'],
            ['kabupaten_id' => 5, 'nama' => 'Kecamatan Mataram Timur'],
            ['kabupaten_id' => 6, 'nama' => 'Kecamatan Kupang Barat'],
            ['kabupaten_id' => 6, 'nama' => 'Kecamatan Kupang Timur'],
            ['kabupaten_id' => 7, 'nama' => 'Kecamatan Pontianak Kota'],
            ['kabupaten_id' => 7, 'nama' => 'Kecamatan Pontianak Timur'],
            ['kabupaten_id' => 8, 'nama' => 'Kecamatan Palangkaraya Kota'],
            ['kabupaten_id' => 8, 'nama' => 'Kecamatan Bukit Raya'],
            ['kabupaten_id' => 9, 'nama' => 'Kecamatan Banjarmasin Selatan'],
            ['kabupaten_id' => 9, 'nama' => 'Kecamatan Banjarmasin Utara'],
            ['kabupaten_id' => 10, 'nama' => 'Kecamatan Balikpapan Selatan'],
            ['kabupaten_id' => 10, 'nama' => 'Kecamatan Balikpapan Utara'],
        ];

        foreach ($kecamatans as $kecamatan) {
            Kecamatan::create($kecamatan);
        }
    }
}
