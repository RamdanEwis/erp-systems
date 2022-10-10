<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    protected $guarded = [] ;

    public function invoice()
    {
        return $this->belongsTo(InvoiceSale::class,'invoice_number','id');
    }
}
