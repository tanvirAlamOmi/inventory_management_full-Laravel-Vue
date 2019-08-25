<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use DB;

class VendorController extends Controller
{
    public function create()
    {
        return view('adminDashboard.vendors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
            'address' => 'required',
            'role' => 'required | integer',
        ]);

        $vendors = new Vendor();
        
        $vendors->name = $request->name;
        $vendors->email = $request->email;
        $vendors->phone = $request->phone;
        $vendors->address = $request->address;
        $vendors->role = $request->role;

        $vendors->save();

        sync('vendors');
        return redirect()->route('vendors.manage')->with('message','Vendor saved Successfully');
    }
    public function manage()
    {
        $vendors = Vendor::paginate(10);

        return view('adminDashboard.vendors.manageVendors',compact('vendors'));
    }

    public function edit($id)
    {
        $vendors = Vendor::where('id',$id)->first();

        return view('adminDashboard.vendors.editVendors',compact('vendors'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
            'address' => 'required',
            'role' => 'required | integer',
        ]);

        $vendors = Vendor::find($request->id);

        $vendors->name = $request->name;
        $vendors->email = $request->email;
        $vendors->phone = $request->phone;
        $vendors->address = $request->address;
        $vendors->role = $request->role;

        $vendors->save();

        sync('vendors');
        return redirect('/vendors/manage')->with('message','Vendor Info Updated Successfully!!');
    }
    public function delete($id)
    {
        $vendors = Vendor::find($id);

        $vendors->delete();

        sync('vendors');
        return redirect('/vendors/manage')->with('message2','Vendor Deleted Successfully !!');
    }
}
