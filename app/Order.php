<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id_order';
    protected $fillable = [
    	'tgl_order', 'users', 'alamat', 'product', 'discount', 'berat', 'pengiriman', 'status', 'total_pembayaran',
    ];
}
