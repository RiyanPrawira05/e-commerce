<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
    protected $table = 'warna';
    protected $primaryKey = 'id_warna';
    protected $fillable = [ 
    	'warna', 
    ];

     public $timestamps = false;
}
