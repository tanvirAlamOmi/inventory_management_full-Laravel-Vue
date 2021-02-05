<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoicePdf extends Model
{
    public $table = 'sells';
    protected $fillable = [
        'name', 'phone', 'total'
    ];
}
