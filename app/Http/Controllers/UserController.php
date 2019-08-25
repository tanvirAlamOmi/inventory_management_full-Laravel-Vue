<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use App\User;

class UserController extends Controller
{
    public function create()
    {
        return view('adminDashboard.users.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'role' => 'required | integer',
        ]);

        $users = new User();
        
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->role = $request->role;

        $users->save();

        sync('users');
        return redirect()->back()->with('message','User saved Successfully');
    }


    public function manage()
    {
        $users = User::paginate(10);

        return view('adminDashboard.users.manageRoleUsers',compact('users'));
    }

    public function edit($id)
    {
        $users = User::where('id',$id)->first();

        return view('adminDashboard.users.editRoleUsers',compact('users'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'role' => 'required | integer',
        ]);

        $users = User::find($request->id);

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->role = $request->role;

        $users->save();

        sync('users');
        return redirect('/users/manage')->with('message','User Info Updated Successfully!!');
    }
    public function delete($id)
    {
        $users = User::find($id);

        $users->delete();

        sync('users');
        return redirect('/users/manage')->with('message2','User Deleted Successfully !!');
    }
}
