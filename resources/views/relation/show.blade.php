@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show relation
    </h1>
    <br>
    <form method = 'get' action = '{!!url("relation")!!}'>
        <button class = 'btn btn-primary'>relation Index</button>
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
                    <b><i>name : </i></b>
                </td>
                <td>{!!$relation->name!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>slug : </i></b>
                </td>
                <td>{!!$relation->slug!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>isactive : </i></b>
                </td>
                <td>{!!$relation->isactive!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection