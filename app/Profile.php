<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'alamat', 'kota', 'kodepos', 'jeniskelamin', 'noktp', 'namaktp', 'fotoprofil'];

    public function user()
    {
      return $this->belongsTo('App\user');
    }
}
