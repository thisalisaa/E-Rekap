<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPemilihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name', 'saksi_id','status', 

    ];

    public function saksi()
{
    return $this->belongsTo(Saksi::class);
}

}
