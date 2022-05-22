<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{

    protected $guarded = [];

    /**
     * Get the user that owns the phone.
     */

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

}
