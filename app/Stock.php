<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
    protected $primaryKey = 'id_stock';
    protected $fillable = [
    	'stock', 'product', 'category',
    ];

    public $timestamps = false;

    public function pilihProduct()
    {
    	return $this->belongsTo('App\Product', 'product', 'id_product');
    }

    public function pilihCategory()
    {
        return $this->belongsTo('App\Category', 'category', 'id_category');
    }
}
