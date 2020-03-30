
@extends('adminlte::page')

@section('title', 'Add Users')

@section('content_header')
<div class="admin-title">Add User</div>
<hr>
@stop

@section('content')
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif

<form method="POST" action="/admin/user">

@csrf

  <div class="form-group">
    <label for="Email">Email address</label> <span class="text-danger mr-1">*</span>
    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
    @error('email')
    <div class="text-danger">{{$message}}</div>
  @enderror
  </div>
 
  <div class="form-group">
    <label for="Username">User Name</label> <span class="text-danger mr-1">*</span>
    <input type="text" class="form-control" id="username" name="username" placeholder="Full Name">
    @error('username')
    <div class="text-danger">{{$message}}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="Password">Password</label> <span class="text-danger mr-1">*</span>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    @error('password')
    <div class="text-danger">{{$message}}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="Phone">Phone</label><span class="text-danger mr-1">*</span>
    <input type="phone" class="form-control" id="phone" name="phone" placeholder="phone">
    @error('phone')
    <div class="text-danger">{{$message}}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="Address">Address</label> <span class="text-danger mr-1">*</span>
    <input type="address" class="form-control" id="address" name="address" placeholder="address">
    @error('address')
    <div class="text-danger">{{$message}}</div>
  @enderror
  </div>
  <div class="form-group">
  <label for="Role">Assign Role</label><br>
 @foreach($role as $roles)
  <input type="radio" id="role" name="roles[]" value="{{$roles->id}}" class="ml-4">{{$roles->name}} 
@endforeach

  </div>
 
  <a href=""><button class="btn btn-primary mb-3">  Add User</button></a>
</form>

@stop

@include('layouts.admin')