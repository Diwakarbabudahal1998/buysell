{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'About Us')

@section('content_header')
<h4>About Us</h4>
<hr>

@stop

@section('content')
<a href="aboutus/create"><button class="btn btn-success"><i class="fas fa-plus pr-2"></i>Add new Content </button></a>
    <table class="table table-bordered  mt-4">
  <thead>
  <tr>     
  <th style="width: 5%">#</th>
     <th style="width: 20%">Headings</th>
     <th style="width: 20%">Description</th>
     <th style="width: 20%"></th>

   </tr>
 </thead>
 <tbody>
 <?php $i=1?>

 @foreach($about as $r)
   <tr>
   <td>{{$r->id??''}}</td>
   <td>{{$r->aboutus_heading??''}}</td>
   <td>{!!$r->aboutus_description!!}</td>

   <td>
    <form action="/admin/aboutus/{{$r->id}}" method="POST">
        <a href="/admin/aboutus/{{$r->id}}" class="btn btn-info pull-left my-1 ml-1 mr-1">
        <i class="far fa-eye mr-1"></i>View</a>
        <a href="/admin/aboutus/{{$r->id}}/edit" class="btn btn-primary pull-left my-1 ml-1 mr-1">
        <i class="far fa-edit"></i>Edit</a>
                    {{method_field('DELETE')}}
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger pull-left my-1 ml-1">
                    <i class="fas fa-trash-alt mr-1"></i>Delete</button>
                    </form>
  </td>
</tr>
@endforeach
</tbody>
</table>
{{ $about->links() }}

@stop

@include('layouts.admin')