@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit lead
    </h1>
    <form method = 'get' action = '{!!url("lead")!!}'>
        <button class = 'btn btn-danger'>lead Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("lead")!!}/{!!$lead->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="title">title</label>
            <input id="title" name = "title" type="text" class="form-control" value="{!!$lead->
            title!!}"> 
        </div>
        <div class="form-group">
            <label for="isactive">isactive</label>
            <input id="isactive" name = "isactive" type="text" class="form-control" value="{!!$lead->
            isactive!!}"> 
        </div>
        <div class="form-group">
            <label for="nextactiondate">nextactiondate</label>
            <input id="nextactiondate" name = "nextactiondate" type="text" class="form-control" value="{!!$lead->
            nextactiondate!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection