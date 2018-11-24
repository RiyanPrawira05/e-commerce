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

    public $timestamps = false;

    public function pilihProduct()
    {
    	return $this->belongsTo('App\Product', 'product', 'id_product');
    }

    public function pilihWarna()
    {
        return $this->belongsTo('App\Warna', 'warna', 'id_warna');
    }
}
