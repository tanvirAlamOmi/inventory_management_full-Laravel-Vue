<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use Auth;
use DB;

class StockController extends Controller
{
    public function create()
    {   $quantity_types = DB::table('quantity_type')->get();
        $categories = DB::table('categories')
        ->select('categories.*', 'categories.id as category_id')
        ->get();
        $products = DB::table('products')->get();
        $vendors = DB::table('vendors')->get();
        return view('adminDashboard.stocks.create',compact('quantity_types','categories','products','vendors'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            // 'category' => 'required',
            'product_id' => 'required',
            'vendor_id' => 'required',
            'stock_quantity' => 'required',
            'quantity_type_id' => 'required',
            'buying_price' => 'required',
            'is_available' => 'required',
        ]);

        $stocks = new Stock();
        
        // $stocks->category = $request->category;
        $stocks->product_id = $request->product_id;
        $stocks->vendor_id = $request->vendor_id;
        $stocks->stock_quantity = $request->stock_quantity;
        $stocks->quantity_type_id = $request->quantity_type_id;
        $stocks->buying_price = $request->buying_price;
        $stocks->is_available = $request->is_available;
        $stocks->user_id = Auth::user()->id;

        $stocks->save();

        sync('stocks');
        return redirect()->route('stocks.manage')->with('message','Stock saved Successfully');
    }
    public function manage()
    {

        $categories = DB::table('categories')->get();
        $products = DB::table('products')->get();
        $stocks = DB::table('stocks')
        ->join('products', 'products.id', '=', 'stocks.product_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('quantity_type', 'quantity_type.id', '=', 'stocks.quantity_type_id')
        ->join('vendors', 'vendors.id', '=', 'stocks.vendor_id')
        ->join('users','users.id','=','stocks.user_id')
        ->select('stocks.*', 'categories.name as category_name','categories.id as category_id','products.name as products_name','quantity_type.quantity_type as quantity_type','vendors.name as vendor','users.name as user_name')
        ->paginate(10);
        return view('adminDashboard.stocks.manageStocks',compact('stocks','categories','products'));
    }
    
    public function edit($id)
    {
        $stocks = Stock::where('id',$id)->first();
        $quantity_types = DB::table('quantity_type')->get();
        $categories = DB::table('categories')
        ->select('categories.*', 'categories.id as category_id')
        ->get();
        $products = DB::table('products')->get();
        $vendors = DB::table('vendors')->get();

        return view('adminDashboard.stocks.editStocks',compact('stocks','quantity_types','categories','products','vendors'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            // 'category' => 'required',
            'product_id' => 'required',
            'vendor_id' => 'required',
            'stock_quantity' => 'required',
            'quantity_type_id' => 'required',       
            'buying_price' => 'required',
            'is_available' => 'required',
        ]);

        $stocks = Stock::find($request->id);
        
        // $stocks->category = $request->category;
        $stocks->product_id = $request->product_id;
        $stocks->vendor_id = $request->vendor_id;
        $stocks->stock_quantity = $request->stock_quantity;
        $stocks->quantity_type_id = $request->quantity_type_id;
        $stocks->buying_price = $request->buying_price;
        $stocks->is_available = $request->is_available;
        // $stocks->user_id = Auth::user()->id;

        $stocks->save();

        sync('stocks');
        return redirect('/stocks/manage')->with('message','Stock Info Updated Successfully!!');
    }

    public function delete($id)
    {
        $stocks = Stock::find($id);

        $stocks->delete();

        sync('stocks');
        return redirect('/stocks/manage')->with('message2','Stock Deleted Successfully !!');
    }
}
