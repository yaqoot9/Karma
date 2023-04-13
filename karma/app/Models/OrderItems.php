<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{    protected $table='order_items';
    protected $guarded=[];
    use HasFactory;

    //relation
    public function order(){
        return $this->belongsTo(order::class);
    }
    public function product(){
        return $this->belongsTo(product::class);
    }
}
