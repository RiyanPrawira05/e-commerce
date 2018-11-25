<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = [
    	'via', 'tgl_pembayaran',
    ];

    public $timestamps = false;
    public function pilihPembayaran()
    {
    	return $this->belongsTo('App\Via', 'via', 'id_via');
    }
}
