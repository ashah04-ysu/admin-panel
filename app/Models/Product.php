<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'SKU',
        'TSI',
        'VENDOR',
        'BRAND',
        'SHIPPING_TEMPLATE',
        'TEMPLATE_CODE',
        'INSTOCK_LEADTIME',
        'NOSTOCK_LEADTIME',
        'QUANTITY',
        'OBSOLETE',
        'IS_UPDATED',
    ];
};