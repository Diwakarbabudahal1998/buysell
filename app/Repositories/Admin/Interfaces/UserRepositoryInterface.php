<?php
namespace App\Repositories\Admin\Interfaces;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;


interface UserRepositoryInterface
{
    public function viewuser();
    public function createuser();
    public function storeuser(Request $request);
    public function deleteuser($id);

    


}