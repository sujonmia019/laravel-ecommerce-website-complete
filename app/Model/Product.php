<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id','brand_id','name','slug','price','short_desc','long_desc','image'
    ];

    // category name
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // brand name
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }


}
