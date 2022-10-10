<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function InvoiceBuy()
    {
        return $this->hasMany( InvoiceBuy::class,'supplier_id','id');
    }
}
