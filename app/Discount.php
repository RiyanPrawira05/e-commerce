<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';
    protected $primaryKey = 'id_discount';
    protected $fillable = [
    	'kode', 'potongan', 'users', 'product', 'open_discount', 'expired_discount',
    ];

    public $timestamps = false;

    public function pilihPengguna()
    {
    	return $this->belongsTo('App\User', 'users', 'id_users');
    }

    public function pilihProduct()
    {
    	return $this->belongsTo('App\Product', 'product', 'id_product');
    }
}
