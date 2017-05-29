<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    protected $fillable = ['invoice_id','item_name','no_items','price','total','sub_total','tax','all_total'];
    
}
