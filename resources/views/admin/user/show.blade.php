
@extends('adminlte::page')

@section('title', 'View User')


@section('content_header')
@stop

@section('content')
<div class="container-fluid">
<form method="POST" action="" >
<h3 class="subheadline my-4 text-uppercase font-weight-bold text-danger">User Information</h3>   
<div class="row mb-2">
    <div class="input-group col-md-6 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">User Name</div>
        </div>
        <input type="text" value="{{($user)?$user['name']:''}}" name="property_price" class="form-control"disabled/>
    </div>
  <div class="input-group col-md-4 mb-2 mr-sm-2 ">
    <div class="input-group-prepend">
      <div class="input-group-text bg-success">Email</div>
    </div>
    <input type="text" value="{{($user)?$user['email']:''}}" name="property_price" class="form-control"disabled/>
  </div>
</div>
<div class="row mb-2">
    <div class="input-group col-md-4 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Address</div>
        </div>
        <input type="text" value="{{($user)?$user['address']:''}}" name="property_price" class="form-control"disabled/>
    </div>
    <div class="input-group offset-md-2 col-md-4 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Role</div>
        </div>
        <input type="text" value="{{$role->implode(' ')}}" name="property_price" class="form-control"disabled/>
  </div>
</div>

     
<div class="row mb-2">   
 
  <div class="input-group  col-md-3 mb-2 mr-sm-2 ">
    <div class="input-group-prepend">
      <div class="input-group-text bg-success">Phone</div>
    </div>
    <input type="text" value="{{($user)?$user['phone']:''}}" name="property_price" class="form-control"disabled/>
  </div>

</div>  

</form>
@stop

@include('layouts.admin')
