<?php

namespace App\Http\Controllers\Admin;
use App\Models\Gallery;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $realestate_id=$id;
        $images=Gallery::where('realestate_id',$id)->get();
        return view('admin.realestate.photo',compact('realestate_id','images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $photos = $request->file('file');
        if (!is_dir(public_path('/images'))) {
            mkdir(public_path('/images'), 0777);
        }
            $photo = $photos;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $realestate_id=$id;
    //     $images=Gallery::where('realestate_id',$id)->get();
    //     return view('admin.realestate.photo',compact('realestate_id','images'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo=Gallery::all()->where('id',$id)->pluck('photos')->first();
        Storage::disk('public')->delete($photo);
        $deletedPhoto=Gallery::all()->where('id',$id)->first();
        $deletedPhoto->delete();
        return redirect('admin/realestate/' . $realestate.'/photos');
    }
}
