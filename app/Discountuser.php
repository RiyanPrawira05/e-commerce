<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discountuser extends Model
{
    protected $table = 'discount_user';
    protected $primaryKey = 'id_discount_user';
    protected $fillable = [
    	'discount', 'user',
    ];
}
