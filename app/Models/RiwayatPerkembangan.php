<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPerkembangan extends Model
{
    protected $table = 'riwayat_perkembangan';

    protected $fillable = [
        'activity',
        'progress_id',
        'laporans_id',
    ];
}
