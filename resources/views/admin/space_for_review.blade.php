@extends('layouts.admin')

@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Spaces For Review</h2>
            </div>
        </div>
    </div>

    <div class="panel panel-default panel-table">
        <div class="panel-body">

    <table class="table table-striped table-bordered table-list">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>City</th>
            <th>Company</th>
            <th>Person</th>
            <th>Contact</th>
            <th width="150px">Action</th>
        </tr>
    @foreach ($spaces as $key => $sp)
    <tr>
        <td>{{ $sp->id }}</td>
        <td>{{ $sp->name }}</td>
        <td>{{ $sp->short_name }}</td>
        <td>{{ $sp->city }}</td>
        <td>{{ $sp->company }}</td>
        <td>{{ $sp->person }}</td>
        <td>{{ $sp->phone_number }}</td>
        <td align="center">
            <a class="btn btn-default" href="{{ url('space/'.$sp->id) }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
            <a class="btn btn-default" href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <!-- <a class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> -->
            {!! Form::open(['method' => 'DELETE','route' => ['space.destroy', $sp->id],'style'=>'display:inline']) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    </div>
    </div>

    {!! $spaces->render() !!}

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

@endsection