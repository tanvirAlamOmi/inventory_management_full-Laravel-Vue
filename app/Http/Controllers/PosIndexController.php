<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Stock;
use App\DamageStock;
use DB;

class PosIndexController extends Controller
{    public function index(){

        $products=DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->select('products.*','categories.name as product_catagory')
        ->get();

        $master_stock = Stock::get();
        $master_damaged_stock = DamageStock::get();

        foreach($products as $product){
            $current_stock = $master_stock->where('product_id',$product->id)->sum('stock_quantity');
            $current_stock -= $master_damaged_stock->where('product_id',$product->id)->sum('damaged_quantity');
            $product->current_stock = $current_stock;
        }

        return response()->json($products);

}
    public function view()
    {
        
        return view('adminDashboard.posIndex.posIndex');

    }
    public function searchproduct(Request $request){


        $searchValue= $request->get('search_result');
      
        $product=DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->select('products.*','categories.name as product_catagory')
        ->where('products.name', 'like', '%' . $searchValue . '%')
          ->orWhere('categories.name', 'like', '%' . $searchValue . '%')
          ->orWhere('products.price', 'like', '%' . $searchValue . '%')
          ->get();
    //   return $product;
      
            return response()->json($product);
      
        }
}
