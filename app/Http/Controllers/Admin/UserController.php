<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Permission;
use App\Repositories\Admin\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        return $this->user->viewuser();   
    }

    
    public function create()
    {
       return $this->user->createuser();
    }

    
    public function store(Request $request)
    {
        return $this->user->storeuser($request);
    }

    public function show($id)
    {
        $user=User::find($id);
        $role=$user->roles->pluck('name');
        return view('admin.user.show',compact('user','role'));
        
    }

    public function edit($id)
    {
        $user=User::find($id);
        $roles=Auth::user()->roles->pluck('name');
      $allRoles=Role::all()->pluck('name');
        return view('admin.user.edit',compact('user','roles','allRoles'));
    }

   

    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $user->name=$request->name;
        $user->address=$request->address;
        $user->email=$request->email;
        $user->password=$user->password;
        $user->save();
        $user->syncRoles($request->role);
        return redirect('admin/user');
   
    }

    public function destroy($id)
    {
       
        return $this->user->deleteuser($id);   

    }
}
