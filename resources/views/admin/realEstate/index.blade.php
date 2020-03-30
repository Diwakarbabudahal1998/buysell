@extends('adminlte::page')

@section('title', 'Real Estate')

@section('content_header')
<h4>Real Estate</h4>
<hr>

@stop

@section('content')
<a href="realestate/create"><button class="btn btn-success"><i class="fas fa-plus pr-1"></i>Add a Real Estate</button></a>
<a href="realestate/category/create"><button class="btn btn-info"><i class="fas fa-plus pr-1"></i>Manage Category</button></a>
    <table class="table table-bordered  mt-4" id="table">
  <thead>
  <tr>
  <th style="width: 5%">#</th>
     <th style="width: 20%">Property Name</th>
     <th style="width: 10%">Property Status</th>
     <th style="width: 10%">Category</th>
     <th style="width: 10%">Featured</th>
     <th style="width: 25%"></th>

   </tr>
 </thead>
 <tbody>
 <?php $i=1?>

 @foreach($realestate as $r)
   <tr>
   <td>{{$i++}}</td>
   <td>{{$r->property_name??''}}</td>
   <td>{{$r->property_status??''}}</td>
   <td>{{$r->category??''}}</td>
   <td>{{$r->featured??''}}</td>

   <td>
   <form action="/admin/realestate/{{$r->id}}" method="POST">
    <a href="/admin/realestate/{{$r->id}}" class="btn btn-info pull-left my-1 ml-1 mr-1"><i class="far fa-eye mr-1"></i>View</a>
    <a href="/admin/realestate/{{$r->id}}/edit" class="btn btn-primary pull-left my-1 ml-1 mr-1"><i class="far fa-edit"></i>Edit</a>
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
{{ $realestate->links() }}

@stop

@include('layouts.admin')
