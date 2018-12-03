<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = 'bank_account';
    protected $primaryKey = 'id_bank';
    protected $fillable = [
    	'name_bank', 'no_rek', 'ats_nama',
    ];

    public $timestamps = false;

}
