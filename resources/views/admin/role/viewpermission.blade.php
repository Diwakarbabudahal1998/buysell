@extends('adminlte::page')

@section('title', 'View Permissions')

@section('content_header')
    <h1>Permissions</h1>
@stop

@section('content')
<ul>
@foreach($permissions as $permission)
<li>{{$permission}}</li>
@endforeach
</ul>
@stop

@include('layouts.admin')