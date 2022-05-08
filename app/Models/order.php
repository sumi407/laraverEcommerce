<?php

namespace App\Models;
use App\Models\orderItems;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable =[
        'user_id',
        'name',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'total_price',
        'status',
        'message',
        'tracking_no',

       
    ];
    public function orderitem()
    {
        return $this->hasMany(orderItems::class);
    }

}
