<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    protected $fillable = [
        'first_code',
        'last_code',
        'prefecture',
        'city',
        'address'
    ];
}
