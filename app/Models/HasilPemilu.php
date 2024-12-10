<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tps;
use App\Models\User;

class HasilPemilu extends Model
{
    use HasFactory;

    protected $fillable = [
        'tps_id',
        'user_id',
        'jumlah_suara',
        'foto_hasil',
        'status_verifikasi',
    ];

    public function tps()
    {
        return $this->belongsTo(Tps::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
