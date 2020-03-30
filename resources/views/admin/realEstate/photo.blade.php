
@extends('adminlte::page')

@section('title', 'Photos')

@section('content_header')
<h1>Upload the Photo</h1>
@stop

@section('content')
@include('admin.realestate.dropzone')

<button class="btn btn-info mt-4 mb-2" onclick="location.reload();">Upload</button>
<h4 class="mt-4">Your Uploads</h4>
<table class="table table-responsive mt-2">
        <thead >
        <tr>
            <th>Your Photos</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($images as $value)  
   <tr>
       
              <td><img class="img-thumbnail" src="{{asset('storage/photos/'.$value->photos)}}" style="width:150px"/></td>
              <td class="text-center">  
              <form>
              <a href="/admin/realestate/{{$realestate_id}}/photos/{{$value->id}}" >
                    {{method_field('DELETE')}}
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger pull-left my-1 ml-1">
                    <i class="fas fa-trash-alt mr-1"></i>Delete</button>
                  </a>
                    </form>                      

                    
                    </td>
            </tr>
              @endforeach
           

</tbody>

</table>
<a href="/admin/realestate"class="btn btn-primary mt-4 mb-2">Save Changes</a>

@stop

@include('layouts.admin')