<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\Interfaces\RoleRepositoryInterface;
use App\Http\Requests\RoleRequest;


class RoleController extends Controller
{
    public function __construct(RoleRepositoryInterface $role)
    {
        $this->role = $role;
    }

    public function index()
    {
          return $this->role->viewrole();
    }

    public function create()
    {
        return $this->role->createrole();
    }

    public function store(RoleRequest $request)
    {
        return $this->role->storerole($request);
    }
   
    public function edit($id)
    {
        return $this->role->editrole($id);
    }

    
    public function update(Request $request, $id)
    {
        return $this->role->updaterole($request,$id); 
    }

    public function viewPermissions($id)
    {
        return $this->role->viewpermission($id); 


    }

    public function destroy($id)
    {
        return $this->role->deleterole($id); 

    }
}
