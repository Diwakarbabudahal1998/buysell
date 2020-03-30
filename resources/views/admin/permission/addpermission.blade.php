@extends('adminlte::page')

@section('title', 'Add Permissions')

@section('content_header')
    <h1>Permission</h1>
@stop

@section('content')
@role('Admin')
<h4>Add a New Permission</h4>
<form class="col-md-3" method="POST" action="addpermission/submit">
@csrf
<div class="form-group py-3">
    <label for="role_name">Permission Name</label>
    <input type="text" name="permission_name" class="form-control" id="permission">
  </div>
  <button type="submit" class="btn btn-primary mt-3">Save</button> 
</form>
@stop
@endrole

@include('layouts.admin')