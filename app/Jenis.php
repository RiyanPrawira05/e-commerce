<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';
    protected $fillable = [
    	'bahan', 'slug_bahan', 'deskripsi',
    ];

    public $timestamps = false;
}
