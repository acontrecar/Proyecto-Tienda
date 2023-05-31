<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'order_date',
        'status',
        'total_price',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function order_details()
    {
        return $this->hasMany(Order_detail::class, 'order_id', 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // public function getTotalPrice()
    // {
    //     $total = 0;
    //     foreach ($this->order_details as $order_detail) {
    //         $total += $order_detail->getTotalPrice();
    //     }
    //     return $total;
    // }

    // public function getTotalQuantity()
    // {
    //     $total = 0;
    //     foreach ($this->order_details as $order_detail) {
    //         $total += $order_detail->quantity;
    //     }
    //     return $total;
    // }

    // public function getTotalProducts()
    // {
    //     $total = 0;
    //     foreach ($this->order_details as $order_detail) {
    //         $total++;
    //     }
    //     return $total;
    // }
}
