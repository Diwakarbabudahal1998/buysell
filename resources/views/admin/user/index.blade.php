@extends('adminlte::page')

@section('title', 'Users')
@section('content_header')
<div class="admin-title">Users</div>
<hr>
@stop


@section('content')
    <a href="/admin/user/create" class="btn btn-success my-3"><i class="fas fa-plus pr-2"></i>Add User</a>
    <table class="table table-bordered mt-4" id="table">

            <thead>
                <tr >
                    <th style="width: 5%">#</th>
                    <th style="width: 15%">Name</th>
                    <th style="width: 20%">Email</th>
                    <th style="width: 10%">Phone</th>
                    <th style="width: 10%">User Roles</th>
                    <th style="width: 20%"></th>
                </tr>
            </thead>

            <tbody>
            <?php $i=1?>
                @foreach ($users as $user)
                <tr >
                <td>{{$i++}}</td>

                    <td >{{ $user->name }}</td>
                    <td >{{ $user->email }}</td>
                    <td >{{ $user->phone}}</td>
                    <td >{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td >
                    <form action="/admin/user/{{$user->id}}" method="POST">
                    <a href="/admin/user/{{$user->id}}" class="btn btn-info pull-left my-1 ml-1 mr-1"><i class="far fa-eye mr-1"></i>View</a>
                    <a href="/admin/user/{{$user->id}}/edit" class="btn btn-primary pull-left" style="margin-right: 3px;"><i class="far fa-edit"></i>Edit</a>
                    {{method_field('DELETE')}}
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger pull-left my-1 ml-1">
                    <i class="fas fa-trash-alt mr-1"></i>Delete</button>
                    </form>
                  
                    
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        {{$users->links()}}




@stop

@include('layouts.admin')