<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'n_groups';

    protected $fillable = [
        'n_id', 'category', 'email', 'block_hash', 'tx_hash'
    ];

    public $timestamps = true;

    public function bill() {
        return $this->belongsTo(Bill::class, 'student_email', 'student_email');
    }
}
