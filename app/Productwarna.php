<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productwarna extends Model
{
    protected $table = 'product_warna';
    protected $primaryKey = 'id_product_warna';
    protected $fillable = [
    	'product', 'warna',
    ];
}
