<?php

namespace App\Models;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'categories_id','id');
    }
}
