@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create lead
    </h1>
    <form method = 'get' action = '{!!url("lead")!!}'>
        <button class = 'btn btn-danger'>lead Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("lead")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="title">title</label>
            <input id="title" name = "title" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="isactive">isactive</label>
            <input id="isactive" name = "isactive" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="nextactiondate">nextactiondate</label>
            <input id="nextactiondate" name = "nextactiondate" type="text" class="form-control">
        </div>
        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</section>
@endsection