<?php
namespace App\Repositories\Admin\Repository;
use App\Repositories\Admin\Interfaces\PermissionRepositoryInterface;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;



class PermissionRepository implements PermissionRepositoryInterface
{
    public function viewpermission()
    {
        $permissions=Permission::all();
        return view('admin.permission.viewpermission',compact('permissions'));
    }
    public function createpermission()
    {
        return view('admin.permission.addpermission');
    }
    public function storepermission(Request $request)
    {
        $permission=new Permission;
        $permission->name=$request->permission_name;
        $permission->save();
        return redirect('admin/permission');
    }
    public function editpermission($id)
    {
        $permission=Permission::findById($id);
        return view('admin.permission.editpermission',compact('permission'));
    }
    public function updatepermission(Request $request, $id)
    {
        $permission=Permission::findbyId($id);
        $permission->name=$request->permission_name;
        $permission->save();
        return redirect('/admin/permission');
    }
    Public function deletepermission($id)
    {
        $permissions=Permission::findById($id);
        $permissions->delete();
        return redirect('/admin/permission');
    }
}