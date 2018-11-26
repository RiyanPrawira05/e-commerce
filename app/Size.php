<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'size';
    protected $primaryKey = 'id_size';
    protected $fillable = [
    	'size', 'deskripsi',
    ];

    public $timestamps = false;
}
