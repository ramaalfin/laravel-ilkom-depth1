<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function jurusan()
    {
        return $this->belongsTo('App\Models\Jurusan');
    }

    public function matakuliahs()
    {
        return $this->hasMany('App\Models\Matakuliah');
    }
}
