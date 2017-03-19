@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Prospect Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("prospect")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New prospect</button>
    </form>
    <br>
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Associate <span class="caret"></span> </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="http://backpackcms.local:8000/lead">Lead</a></li>
        </ul>
    </div>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>title</th>
            <th>isactive</th>
            <th>nextactiondate</th>
            <th>title</th>
            <th>isactive</th>
            <th>nextactiondate</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($prospects as $prospect) 
            <tr>
                <td>{!!$prospect->title!!}</td>
                <td>{!!$prospect->isactive!!}</td>
                <td>{!!$prospect->nextactiondate!!}</td>
                <td>{!!$prospect->lead->title!!}</td>
                <td>{!!$prospect->lead->isactive!!}</td>
                <td>{!!$prospect->lead->nextactiondate!!}</td>
                <td>{!!$prospect->lead->created_at!!}</td>
                <td>{!!$prospect->lead->updated_at!!}</td>
                <td>{!!$prospect->lead->deleted_at!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/prospect/{!!$prospect->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/prospect/{!!$prospect->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/prospect/{!!$prospect->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $prospects->render() !!}

</section>
@endsection