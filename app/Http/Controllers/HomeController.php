<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\User;

class HomeController extends Controller
{ 
    use HasRoles;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $role = Role::create(['name' => 'admin']);
        // $role = Role::create(['name' => 'data entry']);
        // $role = Role::create(['name' => 'operator']);
        
        // $permission = Permission::create(['name'=>'addUser']);
        // $permission = Permission::create(['name'=>'editUser']);

        // $role->givePermissionTo($permission);

        
        // auth()->user()->assignRole('admin');
        // auth()->user()->assignRole('data Entry');
        // auth()->user()->assignRole('operator');
        
        return view('adminDashboard.dashboard');
    }
}
