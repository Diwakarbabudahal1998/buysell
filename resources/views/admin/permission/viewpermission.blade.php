@extends('adminlte::page')

@section('title', 'Permissions')

@section('content_header')
<h1>Permissions</h1>

@stop

@section('content')
<a href="/admin/permission/addpermission"><button class="btn btn-primary mb-3">Add Permission</button></a>
    <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>     
     <th scope="col">ID</th>
      <th scope="col">Permission Name</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  @foreach($permissions as $permission)
    <tr>
    <td>{{$permission->id??''}}</td>
    <td>{{$permission->name??''}}</td>
  
    <td>
    <a href="permission/edit/{{$permission->id}}"><button class="btn btn-info">Edit</button></a>
    <a href="permission/delete/{{$permission->id}}"> <button class="btn btn-danger">Delete</button></td></a>
    </tr>
    @endforeach

  </tbody>
@stop

@include('layouts.admin')