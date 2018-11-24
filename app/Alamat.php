<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamat';
    protected $primaryKey = 'id_alamat';
    protected $fillable = [
    	'alamat', 'users',
    ];

    public $timestamps = false;

    public function pilihUser()
    {
    	return $this->belongsTo('App\User', 'users', 'id_users');
    }
}
