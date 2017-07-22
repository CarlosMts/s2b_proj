@extends('layouts.admin')

@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Space Types</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Short Name</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($spacetypes as $key => $sp)
    <tr>
        <td>{{ $sp->id }}</td>
        <td>{{ $sp->name }}</td>
        <td>{{ $sp->short_name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('spacetype.show',$sp->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('spacetype.edit',$sp->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['spacetype.destroy', $sp->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('spacetype.create') }}"> Create New Item</a>
    </div>

    {!! $spacetypes->render() !!}

@endsection