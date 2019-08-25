<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('adminDashboard.categories.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'is_published' => 'required',
        ]);

        $categories = new Category();
        
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->is_published = $request->is_published;

        $categories->save();

        sync('categories');
        return redirect()->route('categories.manage')->with('message','Category saved Successfully');
    }


    public function manage()
    {
        $categories = Category::paginate(10);

        return view('adminDashboard.categories.manageCategories',compact('categories'));
    }

    public function edit($id)
    {
        $categories = Category::where('id',$id)->first();

        return view('adminDashboard.categories.editCategories',compact('categories'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'is_published' => 'required',
        ]);

        $categories = Category::find($request->id);

        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->is_published = $request->is_published;

        $categories->save();

        sync('categories');
        return redirect('/categories/manage')->with('message','Category Info Updated Successfully!!');
    }
    public function delete($id)
    {
        $categories = Category::find($id);

        $categories->delete();

        sync('categories');
        return redirect('/categories/manage')->with('message2','Category Deleted Successfully !!');
    }
}
