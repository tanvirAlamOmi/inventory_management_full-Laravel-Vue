<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DamageStock;
use DB;

class DamageStockController extends Controller
{
    public function create()
    {   $quantity_types = DB::table('quantity_type')->get();
        $categories = DB::table('categories')
        ->select('categories.*', 'categories.id as category_id')
        ->get();
        $products = DB::table('products')->get();
        return view('adminDashboard.damageStocks.create',compact('quantity_types','categories','products'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            // 'category' => 'required',
            'product_id' => 'required',
            'damaged_quantity' => 'required',
            'quantity_type_id' => 'required',
            'cause' => 'required',
        ]);

        $damageStocks = new DamageStock();
        
        // $damageStocks->category = $request->category;
        $damageStocks->product_id = $request->product_id;
        $damageStocks->damaged_quantity = $request->damaged_quantity;
        $damageStocks->quantity_type_id = $request->quantity_type_id;
        $damageStocks->cause = $request->cause;

        $damageStocks->save();

        sync('damage_stocks');
        return redirect()->route('damageStocks.manage')->with('message','Damage Stock saved Successfully');
    }
    public function manage()
    {
        $damageStocks = DB::table('damage_stocks')
        ->join('products', 'products.id', '=', 'damage_stocks.product_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('quantity_type', 'quantity_type.id', '=', 'damage_stocks.quantity_type_id')
        ->select('damage_stocks.*', 'categories.name as category_name','products.name as products_name','quantity_type.quantity_type as quantity_type')
        ->paginate(10);
        return view('adminDashboard.damageStocks.manageDamageStocks',compact('damageStocks'));
    }

    public function edit($id)
    {
        $damageStocks = DamageStock::where('id',$id)->first();
        $quantity_types = DB::table('quantity_type')->get();
        $categories = DB::table('categories')
        ->select('categories.*', 'categories.id as category_id')
        ->get();
        $products = DB::table('products')->get();

        return view('adminDashboard.damageStocks.editDamageStocks',compact('damageStocks','quantity_types','categories','products'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            // 'category' => 'required',
            'product_id' => 'required',
            'damaged_quantity' => 'required',
            'quantity_type_id' => 'required',
            'cause' => 'required',
        ]);

        $damageStocks = DamageStock::find($request->id);
        
        // $stocks->category = $request->category;
        $damageStocks->product_id = $request->product_id;
        $damageStocks->damaged_quantity = $request->damaged_quantity;
        $damageStocks->quantity_type_id = $request->quantity_type_id;
        $damageStocks->cause = $request->cause;

        $damageStocks->save();

        sync('damage_stocks');
        return redirect('/damageStocks/manage')->with('message','Damaged Stock Info Updated Successfully!!');
    }

    public function delete($id)
    {
        $damageStocks = DamageStock::find($id);

        $damageStocks->delete();

        sync('damage_stocks');
        return redirect('/damageStocks/manage')->with('message2','Damaged Stock Deleted Successfully !!');
    }
    
}
