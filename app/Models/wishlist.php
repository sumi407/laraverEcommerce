<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\wishlist;


class wishlist extends Model
{
    use HasFactory;
    protected $table = "table_wishlist";
    protected $fillable =[
        'user_id',
        'prod_id',
      
       
    ];
    public function product(){
        return $this->belongsTo(product::class,'prod_id','id');
    }
}
