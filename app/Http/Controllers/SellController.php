<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Sell;
use App\SellDescription;
use DB;

class SellController extends Controller
{
    public function sellData(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'total' => 'required',
        ]);

        $sellData = new Sell();
        $sellData->name = $request->name;
        $sellData->phone = $request->phone;
        $sellData->total = $request->total;
        $sellData->save();
        // return back();
        return $request;
        
    
    }
}
