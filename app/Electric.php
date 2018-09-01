<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Electric extends Model
{
    protected $fillable = [
        'title', 'a_date', 'n_date', 'customer_email', 'address', 'date', 'c_month', 'pre_month', 'usage', 'price'
    ];
    public $timestamps = true;
}
