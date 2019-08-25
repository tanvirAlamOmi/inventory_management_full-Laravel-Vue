<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\saleDescription;
class Sale extends Model
{
    public function saleDescription()
    {
    	return $this->hasMany(SaleDescription::class);
    }
}
