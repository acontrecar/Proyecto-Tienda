<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = 'subcategories';
    protected $primaryKey = 'subcategory_id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'category_id',
    ];
}
