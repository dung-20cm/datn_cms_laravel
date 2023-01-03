<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public function product()
    {
        return $this->belongsTo(Product::class,'od_product_id');
    }
}
