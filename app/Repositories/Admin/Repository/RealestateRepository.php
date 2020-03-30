<?php
namespace App\Repositories\Admin\Repository;
use App\Repositories\Admin\Interfaces\RealestateRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Realestate;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

class RealestateRepository implements RealestateRepositoryInterface
{
    public function viewrealestate(){
        $realestate=RealEstate::orderBy('created_at', 'desc')->where('status','active')->paginate(5);
        if($realestate)
        {
        return view('admin.realestate.index',compact('realestate'));
        }
        else
        {
            return view('admin.realestate.index');

        }

    }
}
