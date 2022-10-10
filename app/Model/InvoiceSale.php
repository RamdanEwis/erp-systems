<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceSale extends Model
{
    protected $guarded = [];

    public function SalesDetails()
    {
        return $this->hasMany( SalesDetails::class,'invoice_number','id');
    }

    public function Clients()
    {
        return $this->belongsTo(Client::class,'client_id','id');
    }
}
