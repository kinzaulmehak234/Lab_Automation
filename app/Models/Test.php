<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'T_type', 'criteria', 'result', 'remarks', 'start_date', 'end_date'];


}
