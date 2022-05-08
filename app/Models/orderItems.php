<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItems extends Model
{
    use HasFactory;
    protected $table = "order_items";
    protected $fillable =[
        'order_id',
        'prod_id',
        'qty',
        'price',
       
    ];

 
    public function products()
    {
        return $this->belongsTo(product::class, 'prod_id', 'id');
    }

}
