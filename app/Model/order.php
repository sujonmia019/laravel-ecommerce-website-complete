<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable  = [
        'user_id','shipping_id','payment_id','order_number','order_total','status'
    ];

    public function payment(){
        return $this->belongsTo(Payment::class,'payment_id','id');
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class, 'shipping_id','id');
    }

    public function order_details(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
