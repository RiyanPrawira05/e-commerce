<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
    	'name', 'email', 'jabatan', 'alamat', 'password',
    ];
    protected $hidden = [
    	'password', 'remember_token',
    ];
}
