@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show prospect
    </h1>
    <br>
    <form method = 'get' action = '{!!url("prospect")!!}'>
        <button class = 'btn btn-primary'>prospect Index</button>
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
                <td>{!!$prospect->title!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>isactive : </i></b>
                </td>
                <td>{!!$prospect->isactive!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>nextactiondate : </i></b>
                </td>
                <td>{!!$prospect->nextactiondate!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>title : </i></b>
                </td>
                <td>{!!$prospect->lead->title!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>isactive : </i></b>
                </td>
                <td>{!!$prospect->lead->isactive!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>nextactiondate : </i></b>
                </td>
                <td>{!!$prospect->lead->nextactiondate!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>created_at : </i></b>
                </td>
                <td>{!!$prospect->lead->created_at!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>updated_at : </i></b>
                </td>
                <td>{!!$prospect->lead->updated_at!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>deleted_at : </i></b>
                </td>
                <td>{!!$prospect->lead->deleted_at!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection