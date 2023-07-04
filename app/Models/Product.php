<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'subcategory_id',
        'rating_overage',
        'rating_count',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'subcategory_id');
    }

    public function product_stocks()
    {
        return $this->hasMany(Product_stock::class, 'product_id', 'product_id');
    }

    public function getQuantityBySize($size_id)
    {
        $inventory = $this->product_stocks()->where('size_id', $size_id)->first();
        return $inventory ? $inventory->quantity : null;
    }

    public function sizes()
    {
        return $this->belongsToMany(Sizes::class, 'product_stocks', 'product_id', 'size_id');
    }
}
