<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_click extends Model
{
    use HasFactory;
    protected $fillable=['ip','browser','product_id','latitude','longitude'];
}
