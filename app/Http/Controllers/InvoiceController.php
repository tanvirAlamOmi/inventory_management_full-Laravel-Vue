<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Sale;
use App\SaleDescription;
use DB;

class InvoiceController extends Controller
{
    public function invoice(Request $request)
    {
        $saleIds = DB::table('sale_descriptions')
        ->join('sales', 'sales.id', '=', 'sale_descriptions.saleId')
        ->select('sale_descriptions.saleId', 'sales.id as saleId')
        ->get();
        $saleId = Sale::all()->last()->id;
// return( $saleId);
        $saleDescription = new SaleDescription();
        $saleDescription->saleId =$saleId;
        $saleDescription->product = $request->product;
        $saleDescription->quantity = $request->quantity;
        $saleDescription->save();

        

        return $request;
        
    
    }
}
