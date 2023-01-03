<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo(Category::class,'pro_category_id');
    }
}
