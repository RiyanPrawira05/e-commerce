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
}
