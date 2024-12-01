<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'Product_name', 'manufacture_date', 'Product_desc', 'category_id', 'PType_id', 'product_id','status',
    ];
   

}
