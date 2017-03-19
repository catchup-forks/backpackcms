@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Lead Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("lead")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New lead</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>title</th>
            <th>isactive</th>
            <th>nextactiondate</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($leads as $lead) 
            <tr>
                <td>{!!$lead->title!!}</td>
                <td>{!!$lead->isactive!!}</td>
                <td>{!!$lead->nextactiondate!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/lead/{!!$lead->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/lead/{!!$lead->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/lead/{!!$lead->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $leads->render() !!}

</section>
@endsection