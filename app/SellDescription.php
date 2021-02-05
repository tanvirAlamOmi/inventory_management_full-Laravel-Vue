<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sell;
class SellDescription extends Model
{
    public function sell()
    {
    	return $this->belongsTo(Sell::class);
    }
}
