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
}
