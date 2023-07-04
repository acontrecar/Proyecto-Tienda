<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_stock extends Model
{
    use HasFactory;
    protected $table = 'products_stock';
    protected $primaryKey = 'stock_id';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'size_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function size()
    {
        return $this->belongsTo(Sizes::class, 'size_id');
    }
}
