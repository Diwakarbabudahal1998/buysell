{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'View Job')

@section('content_header')
    <h4>Job Vacancy</h4>
    <hr>

@stop

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="job/create"><button class="btn btn-success"><i class="fas fa-plus pr-1"></i>Add Vacancy</button></a>
        </div>
        <div class="col-md-3">
            <a href="job/category/create"><button class="btn btn-info"><i class="fas fa-plus pr-1"></i>Manage Category</button></a>
        </div>

        <div class="col-md-4 offset-2">
            <form action="/jobsearch" method="get">
                <div class="input-group">
                    <input type="search" class="form-control" name="search" placeholder="Search">
                    <span class="input-group-prepend">
                    <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
                </span>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped mt-4">
        <thead>
        <tr>
            <th style="width: 5%">S.N</th>
            <th scope="col">Company Name</th>
            <th scope="col">Available Position</th>
            <th scope="col">Salary</th>
            <th scope="col">Featured</th>
            <th scope="col">Status</th>
            <th scope="col"></th>

        </tr>
        </thead>
        <tbody>
        <?php $i=1?>
        @foreach($job as $j)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$j->company_name??''}}</td>
                <td>{{$j->available_position??''}}</td>
                <td>{{$j->salary_status??''}}</td>
                <td>{{$j->featured??''}}</td>
                <td>{{$j->status??''}}</td>

                <td>
                    <div class="row">

                        <a href="/admin/job/{{$j->id}}" class="btn btn-info pull-left my-1 ml-1 mr-1"><i class="far fa-eye mr-1"></i>View</a>
                        <a href="/admin/job/{{$j->id}}/edit" class="btn btn-primary pull-left my-1 ml-1 mr-1"><i class="far fa-edit"></i>Edit</a>
                        <form action="/admin/job/{{$j->id}}" method="POST">
                        {{method_field('DELETE')}}
                        @csrf
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger pull-left my-1 ml-1">
                            <i class="fas fa-trash-alt mr-1"></i>Delete</button>
                    </form>
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $job->links() }}

@stop

@include('layouts.admin')
