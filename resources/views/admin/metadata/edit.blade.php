
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'AboutUs')

@section('content_header')
<h4>AboutUs</h4>
<hr>

@stop

@section('content')
<form method="POST" action="/admin/aboutus/{{$about->id}}" enctype="multipart/form-data">
@csrf
{{method_field("PUT")}}
  <div class="form-group col-md-6">
    <label for="heading">Heading</label>   <span class="text-danger font-weight-bold">*</span>
    <input
      type="text"
      name="aboutus_heading"
      class="form-control form-control-lg"
      placeholder="Heading for About Us"
      value="{{$about->aboutus_heading}}"
      id="aboutus_heading"
      autofocus
    />
  </div>

  <div class="form-group py-3">
    <label>Property Description</label>  <span class="text-danger font-weight-bold">*</span>
    <textarea
      class="description form-control form-control-lg text-editor"
      name="aboutus_description"
      id="aboutus_description"
      rows="8"
      value=""
    >{{$about->aboutus_description}}</textarea>
  </div>
  <hr />
    <div class="form-group">
    <button type="submit" class="btn btn-lg btn-primary">
    Save
    </button>
  </div>
  </form>

@stop

@include('layouts.admin')



