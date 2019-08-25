<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Sale;
use App\SaleDescription;
use DB;

class SaleController extends Controller
{
    public function saleData(Request $request)
    {

        $saleData = new Sale();
        $saleData->name = $request->name;
        $saleData->phone = $request->phone;
        $saleData->total = $request->total;
        $saleData->save();

        return back();
        // return $request;
        
    
    }
}
