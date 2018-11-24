<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lingkardada extends Model
{
    protected $table = 'lingkardada';
    protected $primaryKey = 'id_lingkar_dada';
    protected $fillable = [
    	'ukuran', 'product',
    ];

    public $timestamps = false;

    public function pilihProduct()
    {
    	return $this->belongsTo('App\Product', 'product', 'id_product');
    }
}
