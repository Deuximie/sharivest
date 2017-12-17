<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'judul', 'lokasi', 'dana_need', 'profit', 'resiko', 'mulai_proyek', 'selesai_proyek',
        'deskripsi', 'gambar', 'category_id', 'slug', 'status', 'dana_collect'
    ];

    public function getDeskripsiAttribute($deskripsi)
    {
        return asset($deskripsi);
    }
    public function getGambarAttribute($gambar)
    {
        return asset($gambar);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
