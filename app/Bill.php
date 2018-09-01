<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'title', 'a_date', 'n_date', 'customer_email', 'address', 'place_violation', 'date_violation', 'content_violation', 'price'
    ];
    public $timestamps = true;
}
