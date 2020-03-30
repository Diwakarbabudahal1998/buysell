<?php
namespace App\Repositories\Admin\Interfaces;
use Illuminate\Http\Request;


interface PermissionRepositoryInterface
{
    public function viewpermission();
    public function createpermission();
    public function storepermission(Request $request);
    public function editpermission($id);
    public function updatepermission(Request $request, $id);
    public function deletepermission($id);
}