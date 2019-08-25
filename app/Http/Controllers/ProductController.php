<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use DB;

class ProductController extends Controller
{
    public function create()
    {
        $categories = DB::table('categories')->get();
        //     ->where('is_published', 1)
        //     ->get();
        return view('adminDashboard.products.create',compact('categories'));// 
    
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'        => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image'       => 'required',
            'price'       => 'required | integer',
            'code'        => 'required',
            'barCode'     => 'nullable',
            'is_published'=> 'required',
        ]);

        $imageFile = $request->file('image');
        $uploadPath = './images/products';
        $ext =  $imageFile->getClientOriginalExtension();
        $imageName = rand(1111111111,9999999999) . '.' .$ext ;
        $imageFile->move($uploadPath,$imageName );

        $this->do_store($request,$imageName); //Storing data into DB

        return redirect()->route('products.manage')->with('message','Product saved Successfully');
    }

    protected function do_store($request,$imageName)
    {
        $products = new Product();
        $products->name         = $request->name;
        $products->description  = $request->description;
        $products->category_id  = $request->category_id;
        $products->image        = '/images/products/' . $imageName;
        $products->price        = number_format($request->price,2,'.','');
        $products->code         = $request->code;
        $products->barCode      = '1234';
        $products->is_published = $request->is_published;
        $products->save();

        sync('products');
    }

    public function manage()
    {
        // $products = Product::with('category')->get();
        // return $products;
        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->select('products.*', 'categories.name as category_name')
        ->paginate(10);
        // $products = Product::paginate(10);
        return view('adminDashboard.products.manageProducts',compact('products'));
    }

    public function edit($id)
    {
        $categories = DB::table('categories')->get();
        $products = Product::where('id',$id)->first();

        return view('adminDashboard.products.editProducts',compact('products','categories'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'price' => 'required',
            'code' => 'required|distinct',
            'barCode' => 'nullable',
            'is_published' => 'required',
        ]);
        // unlink();
        $imageFile = $request->file('image');

        if(!$imageFile){
            $products = Product::find($request->id);
            $products->name = $request->name;
            $products->description = $request->description;
            $products->price = number_format($request->price,2,'.','');
            $products->code = $request->code;
            $products->barCode = $request->barCode;
            $products->is_published = $request->is_published;
            $products->save();

            sync('products');
        }
        else
        {
            $uploadPath = './images/products';
            $ext =  $imageFile->getClientOriginalExtension();
            $imageName = rand(1111111111,9999999999) . '.' .$ext;
            $imageFile->move($uploadPath,$imageName);
            $this->do_update($request,$imageName);
            
        }


        // $uploadPath = './images/products';
        // $ext =  $imageFile->getClientOriginalExtension();
        // $imageName = rand(1111111111,9999999999) . '.' .$ext;
        // $imageFile->move($uploadPath,$imageName);
        // $this->do_update($request,$imageName); //Storing data into DB
        
        
        return redirect('/products/manage')->with('message','Product Info Updated Successfully!!');
        
        
    }
    
    protected function do_update($request,$imageName)
    {
        $products = Product::find($request->id);
        unlink(public_path().$products->image);
        $products->name = $request->name;
        $products->description = $request->description;
        $products->category_id  = $request->category_id;
        $products->image = '/images/products/' . $imageName;
        $products->price = number_format($request->price,2,'.','');
        $products->code = $request->code;
        $products->barCode = '1234';
        $products->is_published = $request->is_published;
        $products->save();
        
        sync('products');
       

    }
    public function delete($id)
    {
        $products = Product::find($id);

        $products->delete();

        sync('products');
        return redirect('/products/manage')->with('message2','Product Deleted Successfully !!');
    }

    public function view($id)
    {
        $products = Product::where('id',$id)->first();
        return view('adminDashboard.products.productDetails',compact('products'));
    }
}
