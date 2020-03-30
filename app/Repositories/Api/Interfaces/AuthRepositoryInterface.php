<?php
namespace App\Repositories\Api\Interfaces;
use Illuminate\Http\Request;
interface AuthRepositoryInterface
{
    public function register(Request $request);
    public function login(Request $request);
}