<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Product;
use App\DamageStock;
use DB;


class CurrentStockController extends Controller
{
    public function view()
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->select('products.*', 'categories.name as category_name')
        ->paginate(10);
        
        $master_stock = Stock::get();
        $master_damaged_stock = DamageStock::get();
    
        foreach($products as $product){
            $current_stock = $master_stock->where('product_id',$product->id)->sum('stock_quantity');
            $current_stock -= $master_damaged_stock->where('product_id',$product->id)->sum('damaged_quantity');
            $product->current_stock = $current_stock;
            $quantiy_type = Stock::where('product_id',$product->id)->value('quantity_type_id');
            $product->quantiy_type = DB::table('quantity_type')->where('id',$quantiy_type)->value('quantity_type');
        }
        return view('adminDashboard.currentStocks.currentStocksView',compact('products','categories'));
        
    }
}
