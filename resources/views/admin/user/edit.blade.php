
@extends('adminlte::page')

@section('title', 'Edit Users')

@section('content_header')
<div class="admin-title">Edit Users</div>
<hr>
@stop

@section('content')

<form method="POST" action="/admin/user/{{$user->id}}">
@csrf
{{method_field("PUT")}}
  <div class="form-group">
    <label for="Email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="Username">User Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="Full Name">
  </div>

  <div class="form-group">
    <label for="Phone">Phone</label>
    <input type="phone" class="form-control" id="phone" name="phone" value="{{$user->phone}}" placeholder="phone">
  </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <input type="address" class="form-control" id="address" name="address"  value="{{$user->address}}" placeholder="address">
  </div>
  <div class="form-group">
  <label for="permission">Roles</label>
  <br>
    @foreach($allRoles as $role)
        <div class="form-check form-check-inline">
            <?php $result=""?>
                @foreach($roles as $r)
                    @if($r===$role)
                        <?php $result="checked";?>
                    @endif
                 @endforeach
                <input class="form-check-input px-2 " type="radio" id="role" name="role[]" value="{{$role}}" {!!$result!!}>
                <label class="form-check-label" for="inlineCheckbox1">{{$role}}</label>
        </div><br/>
        @endforeach   
        <a href=""><button class="btn mt-3 btn-primary"><i class="far fa-edit"></i>Edit User</button></a>

</form>

@stop

@include('layouts.admin')