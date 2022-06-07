<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceBuy extends Model
{
protected $guarded = [];


    public function category()
    {
        return $this->belongsTo( Category::class);
    }
    public function InvoiceBayProduct()
    {
        return $this->hasMany( InvoiceBayProduct::class);
    }
}
