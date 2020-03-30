<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Repositories\Admin\Interfaces\PermissionRepositoryInterface;

class PermissionController extends Controller
{
   
   public function __construct(PermissionRepositoryInterface $permission)
    {
        $this->permission = $permission;
    }
   
    public function index()
    {
     
       return $this->permission->viewpermission();
    }

    public function create()
    {
        return $this->permission->createpermission();
        
    }

    public function store(Request $request)
    {
       return $this->permission->storepermission($request);
    }

    public function edit($id)
    {
       return $this->permission->editpermission($id);
    }

    public function update(Request $request, $id)
    {
       return $this->permission->updatepermission($request,$id);
    }

    public function destroy($id)
    {
       return $this->permission->deletepermission($id);
    }
}
