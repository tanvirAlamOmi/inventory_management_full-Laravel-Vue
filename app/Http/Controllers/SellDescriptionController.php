<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Sell;
use App\SellDescription;
use DB;


class SellDescriptionController extends Controller
{
    
    public function sellDescription(Request $request)
    {
        
        $sellIds = DB::table('sell_descriptions')
        ->join('sells', 'sells.id', '=', 'sell_descriptions.saleId')
        ->select('sell_descriptions.saleId', 'sells.id as saleId')
        ->get();
        $saleId = Sell::all()->last()->id;
        $sellDescription = new SellDescription();
        $sellDescription->saleId =$saleId;
        $sellDescription->product = $request->product;
        $sellDescription->quantity = $request->quantity;
        $sellDescription->save();
        
        return $request;
        
    
    }
}
