@extends('adminlte::page')

@section('title', 'Job')

@section('content_header')
    <h4>Category</h4>
    <hr>

@stop

@section('content')
    <form method="POST" action="/admin/job/category">
        <div class="form-group">
            @csrf
            <div class="col-md-6">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" name="category_name" id="category_name" aria-describedby="helpId" placeholder="">
            </div>
            <button class="btn btn-primary mt-3">Add Category</button></div>
    </form>
    <table class="table table-bordered  mt-4" id="table">
        <thead>
        <tr>
            <th style="width: 5%">SN.</th>
            <th style="width: 20%">Category Name</th>
            <th style="width: 20%"></th>


        </tr>
        </thead>
        <tbody>
        <?php $i=1?>

        @foreach($category as $c)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$c->category_name??''}}</td>

                <td>
                    <a href="/admin/job/category/delete/{{$c->id}}">
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger pull-left my-1 ml-1">
                            <i class="fas fa-trash-alt mr-1"></i>Delete</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $category->links() }}



@stop

@include('layouts.admin')
