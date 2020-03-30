<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
        // Permission::create(['name' => 'Edit RealEstate']);
        // Permission::create(['name' => 'View RealEstate']);
        // Permission::create(['name' => 'Delete RealEstate']);
        // $permission = Permission::findById(5);
        // $role = Role::findById(1);
        // $role->givePermissionTo($permission);

        return view('home');
       
    }
}
