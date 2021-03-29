<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //use HasFactory;
    protected $table = 'product';
    protected $fillable = ['product_code','product_name','product_unitprice','product_quantity'] ;
}
