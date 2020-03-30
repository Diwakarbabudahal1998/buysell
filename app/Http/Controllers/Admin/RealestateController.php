<?php

namespace App\Http\Controllers\Admin;
use App\Repositories\Admin\Interfaces\RealestateRepositoryInterface;
use App\Models\Realestate;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RealestateRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


use App\Models\RealestateCategory;
use Geocoder;

class RealEstateController extends Controller
{
    public function __construct(RealestateRepositoryInterface $realestate)
    {
        $this->realestate = $realestate;
    }
    public function index()
    {
         return $this->realestate->viewrealestate();
         
    }

    public function create()
    {
        $category=RealestateCategory::all()->where('status','active');
        if($category)
        {
            return view('admin.realestate.create',compact('category'));
        }
        else{
            return view('admin.realestate.create');
        }

    }
 
    public function store(RealestateRequest $request)
    {
        $real=new Realestate;
        $validatedData = $request->validated();
        $real->property_name=$request->property_name;
        $real->category=$request->category_name;
        $real->property_price=$request->property_price;
        $real->property_status=$request->property_status;
        $real->price_status=$request->price_status;
        $real->address=$request->address;
        $real->city=$request->city;
        $real->tole=$request->tole;
        $real->district=$request->district;
        $real->country=$request->country;
        $real->province=$request->province;
        $real->ward_number=$request->ward_number;
        $real->house_number=$request->house_number;
        $real->zip_code=$request->zip_code;
        $real->year_build=$request->built_year;
        $real->area_type=$request->area_type;
        $real->property_area=$request->property_area;
        $real->mohoda_length=$request->mohoda_length;
        $real->mohoda_direction=$request->mohoda_direction;
        $real->number_of_bedrooms=$request->number_of_bedrooms;
        $real->number_of_bathrooms=$request->number_of_bathrooms;
        $real->number_of_floors=$request->number_of_floors;
        $real->number_of_kitchens=$request->number_of_kitchen;
        $real->gym= ($request->gym==='yes')?$request->gym:'no';
        $real->garden=($request->garden==='yes')?$request->garden:'no';
        $real->swimming_pool=($request->swimming_pool==='yes')?$request->swimming_pool:'no';
        $real->internet=($request->internet==='yes')?$request->internet:'no';
        $real->parking=($request->parking==='yes')?$request->parking:'no';
        $real->water=($request->water==='yes')?$request->water:'no';
        $real->school_college_nearby=($request->school_college_nearby==='yes')?$request->school_college_nearby:'no';
        $real->shopping_nearby=($request->shopping_nearby==='yes')?$request->shopping_nearby:'no';
        $real->bank_nearby=($request->bank_nearby==='yes')?$request->bank_nearby:'no';
        $real->pitched_road=($request->pitched_road==='yes')?$request->pitched_road:'no';
        $real->airport_nearby=($request->airport_nearby==='yes')?$request->airport_nearby:'no';
        $real->sewage=($request->sewage==='yes')?$request->sewage:'no';
        $real->alarm=($request->alarm==='yes')?$request->alarm:'no';
        $real->cctv=($request->cctv=='yes')?$request->cctv:'no';  
        $real->ac=($request->ac==='yes')?$request->ac:'no';
        $real->alarm=($request->alarm==='yes')?$request->alarm:'no';
        $real->user_id=Auth::user()->id;
        if($request->latitude && $request->longitude)
        {
            $real->latitude=$request->latitude;
            $real->longitude=$request->longitude;
        }
        else{
            $map=Geocoder::getCoordinatesForAddress($request->tole, $request->address,$request->city);
            $real->latitude=$map['lat'];
            $real->longitude= $map['lng'];
         
        }
      
        $real->featured=($request->featured==='yes')?$request->featured:'no';
        $real->description=$request->description;
        $real->status="active";
        $real->save();
        return redirect('admin/realestate/'.$real->id.'/photos');
    }

    public function show($realEstate)
    {
        $real=Realestate::find($realEstate);
        return view('admin.realestate.show',compact('real'));

    }

    public function edit($realEstate)
    {
        $real=Realestate::find($realEstate);
       return view('admin.realestate.edit',compact('real'));
    }

    public function update(Request $request,$id)
    {
        $real=Realestate::find($id);
        $real->property_name=$request->property_name;
        $real->category=$request->category_name;
        $real->property_price=$request->property_price;
        $real->property_status=$request->property_status;
        $real->price_status=$request->price_status;
        $real->address=$request->address;
        $real->city=$request->city;
        $real->district=$request->district;
        $real->country=$request->country;
        $real->province=$request->province;
        $real->ward_number=$request->ward_number;
        $real->house_number=$request->house_number;
        $real->zip_code=$request->zip_code;
        $real->year_build=$request->built_year;
        $real->area_type=$request->area_type;
        $real->property_area=$request->property_area;
        $real->mohoda_length=$request->mohoda_length;
        $real->mohoda_direction=$request->mohoda_direction;
        $real->number_of_bedrooms=$request->number_of_bedrooms;
        $real->number_of_bathrooms=$request->number_of_bathrooms;
        $real->number_of_floors=$request->number_of_floors;
        $real->number_of_kitchens=$request->number_of_kitchen;
        $real->gym= ($request->gym==='yes')?$request->gym:'no';
        $real->garden=($request->garden==='yes')?$request->garden:'no';
        $real->swimming_pool=($request->swimming_pool==='yes')?$request->swimming_pool:'no';
        $real->internet=($request->internet==='yes')?$request->internet:'no';
        $real->parking=($request->parking==='yes')?$request->parking:'no';
        $real->water=($request->water==='yes')?$request->water:'no';
        $real->school_college_nearby=($request->school_college_nearby==='yes')?$request->school_college_nearby:'no';
        $real->shopping_nearby=($request->shopping_nearby==='yes')?$request->shopping_nearby:'no';
        $real->bank_nearby=($request->bank_nearby==='yes')?$request->bank_nearby:'no';
        $real->pitched_road=($request->pitched_road==='yes')?$request->pitched_road:'no';
        $real->airport_nearby=($request->airport_nearby==='yes')?$request->airport_nearby:'no';
        $real->sewage=($request->sewage==='yes')?$request->sewage:'no';
        $real->alarm=($request->alarm==='yes')?$request->alarm:'no';
        $real->cctv=($request->cctv=='yes')?$request->cctv:'no';  
        $real->ac=($request->ac==='yes')?$request->ac:'no';
        $real->alarm=($request->alarm==='yes')?$request->alarm:'no';
        $real->user_id=Auth::user()->id;
        $real->featured=($request->featured==='yes')?$request->featured:'no';

        $real->description=$request->description;
        $real->save();
          return redirect('/admin/realestate');
    }

     public function destroy($id)
     {
         $realestate=Realestate::find($id);
         $realestate->status="inactive";
         $realestate->save();
         return redirect('/admin/realestate');
     }


    public function viewCategory()
    {
        $category=RealestateCategory::orderBy('created_at', 'desc')->where('status','active')->paginate(5);
        if($category)
        {
            return view('admin.realestate.category',compact('category'));
        }
        else{
            return view('admin.realestate.category');

        }
    }

public function addCategory(Request $request)
{
    $category=new RealestateCategory;
    $category->category_name=$request->category_name;
    $category->status="active";
    $category->save();
    return redirect('/admin/realestate/category/create');
}
public function deleteCategory($id)
{
    $category=RealestateCategory::find($id);
    $category->status="inactive";   
    $category->save();
    return redirect('/admin/realestate/category/create');

}
}
