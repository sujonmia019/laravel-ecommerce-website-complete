<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'phone','email','logo','facebook','twitter','youtube','linkdin','address','description','created_by'
    ];
}
