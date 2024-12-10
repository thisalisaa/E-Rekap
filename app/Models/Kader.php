<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    protected $fillable = [
        'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
        'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'kelurahan_id', 'tps'
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
