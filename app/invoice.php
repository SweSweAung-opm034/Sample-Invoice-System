<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
   protected $fillable = ['id','invoice_name','total_items','price_total'];
    
}