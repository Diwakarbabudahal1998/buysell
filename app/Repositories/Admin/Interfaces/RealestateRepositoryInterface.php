<?php
namespace App\Repositories\Admin\Interfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Realestate;
use App\Models\Gallery;

interface RealestateRepositoryInterface
{
    public function viewrealestate();

}