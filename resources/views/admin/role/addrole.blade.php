{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Add Roles')

@section('content_header')
@stop

@section('content')
<h3 class="text-center">Add new role</h3>
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
<form method="POST" action="addrole/submit">
@csrf
<div class="form-group">
    <label for="Role">Role Name</label>
    <input type="text" class="form-control" id="role" placeholder="User Role" name="rolename">
</div>
<div class="form-group">
  <label for="Role">Permissions</label>
  <br>
  @foreach($permission as $permissions)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="permission[]" id="inlineCheckbox1" value="{{$permissions->name}}">
        <label class="form-check-label" for="inlineCheckbox1">{{$permissions->name}}</label>
    </div>
    @endforeach
</div>
  <button type="submit" class="btn btn-primary">Add</button>
 
</form>
@stop

@include('layouts.admin')