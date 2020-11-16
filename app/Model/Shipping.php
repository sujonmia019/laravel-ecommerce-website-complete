<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'user_id','name','email','city','state','zip_code','mobile','address'
    ];
}
