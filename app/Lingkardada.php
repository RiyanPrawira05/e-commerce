<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lingkardada extends Model
{
    protected $table = 'lingkardada';
    protected $primaryKey = 'id_lingkar_dada';
    protected $fillable = [
    	'ukuran', 'deskripsi',
    ];

    public $timestamps = false;

}
