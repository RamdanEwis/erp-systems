<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BuysDetails extends Model
{
    protected $guarded = [];

    public function invoice()
    {
        return $this->belongsTo(InvoiceBuy::class,'invoice_number','id');
    }
    public function product()
    {
        return $this->hasMany( Product::class,'product_name','id');
    }
}
