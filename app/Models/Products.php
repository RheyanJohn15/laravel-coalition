<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey= 'id';

    protected $fillable = [
        'product_name',
        'quantity',
        'price'
    ];
}
