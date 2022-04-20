<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $fillable =[
        'cate_id',
        'name',
        'small_description',
        'description',
        'orginal_price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    public function category(){

        return $this->belongsTo(category::class,'cate_id','id');
    }

}
