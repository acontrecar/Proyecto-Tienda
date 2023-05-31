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
}
