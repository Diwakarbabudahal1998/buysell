@extends('adminlte::page')

@section('title', 'Edit Roles')

@section('content_header')
@stop

@section('content')
<h4>Edit a Role</h4>
<form class="col-md-3" method="POST" action="{{$role->id}}/submit">
@csrf
<div class="form-group ">
    <label for="role_name">Role Name</label>
    <input type="text" name="role_name" class="form-control" id="role" value="{{$role->name}}">
  </div>
  <div class="form-group">
  <label for="permission">Permission</label>
  <br>
    @foreach($allpermissions as $permission)
        <div class="form-check form-check-inline">
            <?php $result=""?>
                @foreach($permissions as $p)
                    @if($p===$permission)
                        <?php $result="checked";?>
                    @endif
                 @endforeach
                <input class="form-check-input px-2 " type="checkbox" id="permission" name="permission[]" value="{{$permission}}" {!!$result!!}>
                <label class="form-check-label" for="inlineCheckbox1">{{$permission}}</label>
        </div>
    @endforeach   
</div>
<button type="submit" class="btn btn-primary mt-3">Save</button> 
</form>
@stop

@include('layouts.admin')