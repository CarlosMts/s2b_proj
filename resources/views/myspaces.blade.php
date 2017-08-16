@extends('layouts.admin')

@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>My Spaces</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="panel panel-default panel-table">
        <div class="panel-body">

    <table class="table table-striped table-bordered table-list">
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Name</th>
            <th>City</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($spaces as $key => $sp)
    <tr>
        <td>{{ $sp->id }}</td>
        <td>{{ $sp->short_name }}</td>
        <td>{{ $sp->name }}</td>
        <td>{{ $sp->city }}</td>
        <td>
            @if ($sp->admin_reviewed == 0)
                Waiting for approval
            @elseif ($sp->admin_reviewed == 1)
                Approved
            @endif
        </td>
        <td>
            <a class="btn btn-info" href="{{ route('space.show',$sp->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('space.edit',$sp->id) }}">Edit</a>
            <a data-toggle="modal" class="btn btn-danger deleteSpaceModal" data-id="{{ $sp->id }}" data-name="{{ $sp->name }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        </td>
    </tr>
    @endforeach
    </table>

    </div>
    </div>

    {!! $spaces->render() !!}

@endsection