<?php

namespace App\Http\Controllers\Api;

use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactusMail;



class ContactusController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $v= $request->validate([
            'email'=>'required|email',
            'name'=>'required|max:255',
            'subject'=>'required|max:100',
            'message'=>'required'
        ]);
        $contactus= new ContactUs;
        $contactus->email = $request->email;
        $contactus->name  = $request->name;
        $contactus->subject = $request->subject;
        $contactus->message = $request->message;
        $data=([
            'email'=> $request->email,
            'name'=> $request->name,
            'subject'=> $request->subject,
            'message'=> $request->message,
        ]);
        Mail::to(env('MAIL_ADDRESS_CONTACT'))->send(new ContactusMail($data));
        $contactus->save();
        return response()->json([
            'status'=>'true',
            'message'=>'Message submitted sucessfully'
        ],200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
        //
    }
}