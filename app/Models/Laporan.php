<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans';

    protected $fillable = [
        'kode_laporan',
        'pelapor',
        'judul',
        'bukti',
        'deskripsi',
        'latitude',
        'longitude',
        'alamat',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
