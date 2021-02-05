<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SellDescription;
class Sell extends Model
{
    public function sellDescription()
    {
    	return $this->hasMany(SellDescription::class);
    }
}
