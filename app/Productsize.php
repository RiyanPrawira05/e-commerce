<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productsize extends Model
{
    protected $table = 'product_size';
    protected $primaryKey = 'id_size';
    protected $fillable = [
    	'size', 'deskripsi',
    ];

    public $timestamps = false;
}
