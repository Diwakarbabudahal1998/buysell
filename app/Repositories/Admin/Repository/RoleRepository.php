<?php
namespace App\Repositories\Admin\Repository;
use App\Repositories\Admin\Interfaces\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;



class RoleRepository implements RoleRepositoryInterface
{
    public function viewrole()
    {
        $role=Role::all();
        return view('admin.role.viewrole',compact('role'));   
    }
    public function createrole()
    {
        $permission=Permission::all();
        return view('admin.role.addrole',compact('permission'));
    }
    public function storerole(RoleRequest $request)
    {
        $validatedData = $request->validated();
        $role=new Role;
        $role->name=$request->input('rolename');
        $role->save();
        $permission=$request->input('permission');
        $role->givePermissionTo($permission);
        return redirect('/admin/role');
    }
    public function editrole($id)
    {
        $role=Role::findById($id);
        $permissions = $role->permissions()->get()->pluck('name');
        $allpermissions=Permission::all()->pluck('name');
         return view('admin.role.editrole',compact('permissions','role','allpermissions'));
    }
    public function updaterole(Request $request,$id)
    {
        $role=Role::findbyId($id);
        $role->name=$request->input('role_name');
        $role->save();
        $permissionAll=Permission::all();
        $role->revokePermissionTo($permissionAll);
        $data=$request->input('permission');
        $role->givePermissionTo($data);
        return redirect('admin/role');
    }
    public function viewpermission($id)
    {
        $role=Role::findbyId($id);
        $permissions = $role->permissions()->get()->pluck('name');
        return view('admin.role.viewpermission',compact('permissions'));
    }
    public function deleterole($id)
    {
        $role=Role::findById($id);
        $role->delete();
        return redirect('admin/role');
    }
}