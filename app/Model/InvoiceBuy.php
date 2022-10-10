<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceBuy extends Model
{
protected $guarded = [];



    public function BuysDetails()
    {
        return $this->hasMany( BuysDetails::class,'invoice_number','id');
    }

    public function Supplier()
    {
        return $this->belongsTo( Supplier::class,'supplier_id','id');
    }
}
