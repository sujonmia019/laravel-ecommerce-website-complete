<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id','product_id','size_id','color_id','quantity'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function colors(){
        return $this->belongsTo(Color::class,'color_id','id');
    }
    
    public function sizes(){
        return $this->belongsTo(Size::class,'size_id','id');
    }
}
