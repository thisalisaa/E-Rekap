<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nik', 'no_hp', 'jenis_pemeriksa', 'jenis_saksi', 'nama_pasang_kandidat',
    ];

    protected $table = 'saksis';

    public function hasilPemilihans()
    {
        return $this->hasMany(HasilPemilihan::class);
    }
}
