<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lingkardada extends Model
{
    protected $table = 'lingkardada';
    protected $primaryKey = 'id_lingkar_dada';
    protected $fillable = [
    	'ukuran',
    ];

    public $timestamps = false;

}
