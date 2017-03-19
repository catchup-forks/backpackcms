@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show lead
    </h1>
    <br>
    <form method = 'get' action = '{!!url("lead")!!}'>
        <button class = 'btn btn-primary'>lead Index</button>
    </form>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>title : </i></b>
                </td>
                <td>{!!$lead->title!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>isactive : </i></b>
                </td>
                <td>{!!$lead->isactive!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>nextactiondate : </i></b>
                </td>
                <td>{!!$lead->nextactiondate!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection