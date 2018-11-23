<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id_product';
    protected $fillable = [
    	'product', 'foto', 'jenis', 'category', 'harga', 'size', 'deskripsi',
    ];

    public function pilihJenis()
    {
    	return $this->belongsTo('App\Jenis', 'jenis', 'id_jenis');
    }

    public function pilihCategory()
    {
    	return $this->belongsTo('App\Category', 'category', 'id_category');
    }

    public function pilihSize()
    {
        return $this->belongsTo('App\Productsize', 'size', 'id_size');
    }
}
