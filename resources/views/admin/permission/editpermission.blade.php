
@extends('adminlte::page')

@section('title', 'Edit Permissions')

@section('content_header')
    <h1>Permission</h1>
@stop

@section('content')
<h4>Edit a New Permission</h4>
<form class="col-md-3" method="POST" action="{{$permission->id}}/submit">
@csrf
<div class="form-group py-3">
    <label for="role_name">Permission Name</label>
    
    <input type="text" name="permission_name" class="form-control" id="role" placeholder="" value="{{$permission->name}}">
  </div>
  <button type="submit" class="btn btn-primary mt-3">Save</button> 
</form>
@stop

@include('layouts.admin')