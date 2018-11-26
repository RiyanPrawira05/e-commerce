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
        return $this->belongsToMany('App\Size', 'product_size', 'id_product', 'id_size'); // Panggil model Foreign nya, panggil nama kolom integer foreign nya, panggil id tabel ini, panggil id tabel foreign nya
    }
}
