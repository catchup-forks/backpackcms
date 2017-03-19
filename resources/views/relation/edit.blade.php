@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit relation
    </h1>
    <form method = 'get' action = '{!!url("relation")!!}'>
        <button class = 'btn btn-danger'>relation Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("relation")!!}/{!!$relation->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="name">name</label>
            <input id="name" name = "name" type="text" class="form-control" value="{!!$relation->
            name!!}"> 
        </div>
        <div class="form-group">
            <label for="slug">slug</label>
            <input id="slug" name = "slug" type="text" class="form-control" value="{!!$relation->
            slug!!}"> 
        </div>
        <div class="form-group">
            <label for="isactive">isactive</label>
            <input id="isactive" name = "isactive" type="text" class="form-control" value="{!!$relation->
            isactive!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection