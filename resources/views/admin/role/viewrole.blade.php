{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'View Roles')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
@role('Admin')
<table class="table">
<tr>
<th scope="col">Role</th>
</tr>
@foreach($role as $roles)
<tr>
<td>{{$roles -> name}}</td>
<td> 
<a href="/admin/role/editrole/{{$roles->id}}"><button class="btn btn-info">Edit</button></a>
<a href="/admin/role/viewpermission/{{$roles->id}}"><button class="btn btn-success">View Permissions</button></a>
<a href="role/delete/{{$roles->id}}" onclick="return confirm('Are you sure?')"> <button class="btn btn-danger">Delete</button></td></a>
</td>
</tr>
@endforeach
</table>
<a href="/admin/role/addrole"><button class="btn-primary">Add Role</button></a>
   @endrole
@stop

@include('layouts.admin')