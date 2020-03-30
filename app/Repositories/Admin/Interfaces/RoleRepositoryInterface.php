<?php
namespace App\Repositories\Admin\Interfaces;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;



interface RoleRepositoryInterface
{
    public function viewrole();
    public function createrole();
    public function storerole(RoleRequest $request);
    public function editrole($id);
    public function updaterole(Request $request,$id);
    public function viewpermission($id);
    public function deleterole($id);




}