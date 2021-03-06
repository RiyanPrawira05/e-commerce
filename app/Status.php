<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id_status';
    protected $fillable = [
    	'status', 'users',
    ];

    public $timestamps = false;

    public function pilihPengguna()
    {
    	return $this->belongsTo('App\User', 'users', 'id_users');
    }
}
