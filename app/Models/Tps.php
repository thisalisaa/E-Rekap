<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',         
        'code',         
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota_kabupaten',
        'provinsi',
    ];

    public function users()
{
    return $this->hasMany(User::class);
}

}
