<?php

// database/seeders/KabupatenSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kabupaten;

class KabupatenSeeder extends Seeder
{
    public function run()
    {
        $kabupatens = [
            ['provinsi_id' => 1, 'nama' => 'Bandung'],
            ['provinsi_id' => 1, 'nama' => 'Garut'],
            ['provinsi_id' => 2, 'nama' => 'Semarang'],
            ['provinsi_id' => 2, 'nama' => 'Kudus'],
            ['provinsi_id' => 3, 'nama' => 'Surabaya'],
            ['provinsi_id' => 3, 'nama' => 'Malang'],
            ['provinsi_id' => 4, 'nama' => 'Denpasar'],
            ['provinsi_id' => 4, 'nama' => 'Buleleng'],
            ['provinsi_id' => 5, 'nama' => 'Mataram'],
            ['provinsi_id' => 5, 'nama' => 'Sumbawa'],
            ['provinsi_id' => 6, 'nama' => 'Kupang'],
            ['provinsi_id' => 6, 'nama' => 'Atambua'],
            ['provinsi_id' => 7, 'nama' => 'Pontianak'],
            ['provinsi_id' => 7, 'nama' => 'Sanggau'],
            ['provinsi_id' => 8, 'nama' => 'Palangkaraya'],
            ['provinsi_id' => 8, 'nama' => 'Kuala Kapuas'],
            ['provinsi_id' => 9, 'nama' => 'Banjarmasin'],
            ['provinsi_id' => 9, 'nama' => 'Martapura'],
            ['provinsi_id' => 10, 'nama' => 'Balikpapan'],
            ['provinsi_id' => 10, 'nama' => 'Samarinda'],
        ];

        foreach ($kabupatens as $kabupaten) {
            Kabupaten::create($kabupaten);
        }
    }
}

