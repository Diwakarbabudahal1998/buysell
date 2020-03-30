<?php

namespace App\Http\Controllers\Metadata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Metadata;

class MetadataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=Metadata::orderBy('created_at', 'desc')->paginate(2);
        return view('admin.metadata.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.metadata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about= new Metadata;
        $about->aboutus_heading = $request->aboutus_heading;
        $about->aboutus_description = $request->aboutus_description;
        $about->save();
        return redirect('admin\aboutus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $about=Metadata::findorfail($id);
       return view('admin.metadata.show',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about=Metadata::findorfail($id);
        return view('admin.metadata.edit',compact('about'));

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
        $about=Metadata::findorfail($id);
        $about->aboutus_heading = $request->aboutus_heading;
        $about->aboutus_description = $request->aboutus_description;
        $about->save();
        return redirect('admin\aboutus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about=Metadata::findorfail($id);
        $about->delete();
        return redirect('admin\aboutus');
    }
}
