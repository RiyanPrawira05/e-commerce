<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Via extends Model
{
    protected $table = 'via';
    protected $primaryKey = 'id_via';
    protected $fillable = [ 'via', ];

    public $timestamps = false;
}
