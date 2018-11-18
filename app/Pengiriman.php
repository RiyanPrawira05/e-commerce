<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';
    protected $primaryKey = 'id_pengiriman';
    protected $fillable = [
    	'pengiriman', 'alamat', 'tgl_pengiriman',
    ];
}
