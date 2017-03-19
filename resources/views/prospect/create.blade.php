@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create prospect
    </h1>
    <form method = 'get' action = '{!!url("prospect")!!}'>
        <button class = 'btn btn-danger'>prospect Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("prospect")!!}'>
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
        <div class="form-group">
            <label>leads Select</label>
            <select name = 'lead_id' class = 'form-control'>
                @foreach($leads as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
        </div>
        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</section>
@endsection