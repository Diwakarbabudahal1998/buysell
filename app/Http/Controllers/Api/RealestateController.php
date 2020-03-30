<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RealestateRequest;
use App\Models\Realestate;
use App\Http\Resources\Realestate\RealestateResource;
use App\Http\Resources\Realestate\RealestateCollection;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Geocoder;



class RealestateController extends Controller
{
    public function __construct(){

        $this->middleware('auth:api')->except('index','show','search');
    }
        public function mylisting()
    {
     $id=Auth::user()->id;
     $data=Realestate::all()->where('user_id',$id);
     if($data)
     {
  
        return response(RealestateCollection::collection($data));}
    }

    public function index()
    {
        $p=Realestate::all();
        return response(RealestateCollection::collection($p));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    // public function viewPhotos($id)
    // {
    //     $realestate_id=$id;
    //     $images=Gallery::where('realestate_id',$id)->get();
    //     return response([
    //         'status'=>'ok',
    //         'data'=>$images
    //     ],200);
     
    // }
    // public function addPhotos(Request $request,$id)
    // {
    //      $gallery=new Gallery;
    //      $image = $request->file('file');
    //         $filename = $image->store('photos');
    //         Gallery::create([
    //                         'realestate_id'=>$id,
    //                         'photos'=>$filename
    //                     ]);
    //         return response([
    //             'success'=>'ok',
    //             'message'=>'photos submitted successfully'
    //         ],200);
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RealestateRequest $request)
    {
        
            $real=new RealEstate;
        $gallery=new Gallery;
        // $request->validate([
        //            'property_image'=>'required|image|mimes:jpeg,png,gif,svg|max:2048'
        //        ]);

              if ($image = $request->file('property_image'))
        {  
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
            $real->featured=($request->featured==='yes')?$request->featured:'no';
            $real->description=$request->description;
            $real->status="active";
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
                    $real->save();
                    $realEstateId=($gallery->realestate()->associate($real));
       
                    foreach($image as $images){
                        if (!is_dir(public_path('/images'))) {
                            mkdir(public_path('/images'), 0777);
                        }
                            $photo = $images;
                            $name = sha1(date('YmdHis') . Str::random(30));
                            $save_name = $name . '.' . $photo->getClientOriginalExtension();
                            $resize_name = $name . Str::random(2) . '.' . $photo->getClientOriginalExtension();
                 
                            Image::make($photo)
                                ->resize(800, 800)
                                ->save(public_path('/storage/photos') . '/' . $resize_name);
                 
                            $gallery=new Gallery;
                            $gallery->realestate_id=$realEstateId;
                            $gallery->photos=$resize_name;
                            $gallery->save();
                    }
           
                }
                else
                {
                    return response([
                        'error'=>'true'
                        
                        ],400);
                }
           
                
                return response([
                    'success'=>'ok',
                    'message'=>'data submitted successfully',
                    
                ]);
    }

    public function show(Realestate $realestate)
    {
        
        return new RealestateResource($realestate);
    }

    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
          // $request->validate([
        //            'property_image'=>'required|image|mimes:jpeg,png,gif,svg|max:2048'
        //        ]);
    //     $photo=Gallery::all()->where('realestate_id',$id)->pluck('photos');
    //     foreach($photo as $p)
    //     {
    //     Storage::disk('public')->delete($p);
    //     }
    //   $deletedPhoto=Gallery::all()->where('realestate_id',$id);
    //   foreach($deletedPhoto as $d)
    //   {
    //       $d->delete();
    //   }
    
        $real=RealEstate::find($id);
        $gallery=new Gallery;
    

              if ($image = $request->file('property_image'))
        {  
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
            $real->featured=($request->featured==='yes')?$request->featured:'no';
            $real->description=$request->description;
            $real->status="active";
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
                    $real->save();
              
                    foreach($image as $images){
                        if (!is_dir(public_path('/images'))) {
                            mkdir(public_path('/images'), 0777);
                        }
                            $photo = $images;
                            $name = sha1(date('YmdHis') . Str::random(30));
                            $save_name = $name . '.' . $photo->getClientOriginalExtension();
                            $resize_name = $name . Str::random(2) . '.' . $photo->getClientOriginalExtension();
                 
                            Image::make($photo)
                                ->resize(800, 800)
                                ->save(public_path('/storage/photos') . '/' . $resize_name);
                 
                            $gallery=new Gallery;
                            $gallery->realestate_id=$id;
                            $gallery->photos=$resize_name;
                            $gallery->save();
                    }
           
                }
                else
                {
                    return response([
                        'error'=>'true'
                        
                        ],400);
                }
           
                
                return response([
                    'success'=>'true',
                    'message'=>'data updated successfully',
                    
                ]);
    }

   
     public function destroy($id)
     {
         $realestate=Realestate::find($id);
         $realestate->status="inactive";
         $realestate->save();
         return response(['status'=>'ok','message'=>'data deleted successfully']);
     }

    public function deletePhotos($realestate,$id)
    {
      $photo=Gallery::all()->where('id',$id)->pluck('photos')->first();
      Storage::disk('public')->delete($photo);

      $deletedPhoto=Gallery::all()->where('id',$id)->first();
      $deletedPhoto->delete();
    return response([
        'status'=>'ok',
        'message'=>'data deleted successfully'
    ]);    
    }
    
    public function search(Request $request, Realestate $realestate,Gallery $photo)
    {
        $realestate = $realestate->newQuery()->orderBy('created_at','desc');
        if($request->has('category')){
            $realestate->where('category',$request->category)->get();
            $photo->where('realestate_id',$realestate->pluck('id'))->get();
        }
        if ($request->has('city')) {
            $realestate->where('city','like','%'.$request->city.'%')->get();
            $photo->where('realestate_id',$realestate->pluck('id'))->get();

        }
        if ($request -> has('district')){
            $realestate->where('district','like','%'.$request->district.'%');
            $photo->where('realestate_id',$realestate->pluck('id'))->get();

        }
           
        if ($request -> has('address')){
            $realestate->where('address','like','%'.$request->address.'%');
            $photo->where('realestate_id',$realestate->pluck('id'))->get();

        }
        if($request->has('maxprice')){
            $realestate->where('property_price','<=',$request->maxprice);
            $photo->where('realestate_id',$realestate->pluck('id'))->get();

        }
        if($request->has('minprice')){
            $realestate->where('property_price','>=',$request->minprice);
            $photo->where('realestate_id',$realestate->pluck('id'))->get();

        }
        return response()->json([
            'status'=>'true','data'=>$realestate->get(),'photo'=>$photo->get()
            
        ],200);
        
    }
}
