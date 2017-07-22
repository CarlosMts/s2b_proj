@extends('layouts.admin')

@section('content')

<h2>Space Types</h2>

<div class="panel panel-default panel-table">
    <div class="panel-body">
        <table id="mytable" class="table table-striped table-bordered table-list">
            <thead>
            <tr>
                <th class="hidden-xs">ID</th>
                <th class="col-text">Name</th>
                <th class="col-text">Short Name</th>
                <th class="col-tools"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($spacetypes as $key => $sp)
            @if ($sp->deleted == 0)
            <tr>
                <td>{{ $sp->id }}</td>
                <td>{{ $sp->name }}</td>
                <td>{{ $sp->short_name }}</td>
                <td align="center">
                    <a class="btn btn-default" href="{{ route('spacetype.show',$sp->id) }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                    <a class="btn btn-default" href="{{ route('spacetype.edit',$sp->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <!-- <a class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> -->
                    {!! Form::open(['method' => 'DELETE','route' => ['spacetype.destroy', $sp->id],'style'=>'display:inline']) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endif
            @endforeach
            </tbody>
        </table>

    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col col-xs-offset-3 col-xs-6">
                <nav aria-label="Page navigation" class="text-center">
                    {!! $spacetypes->render() !!}
                </nav>
            </div>
            <div class="col col-xs-3">
                <div class="pull-right">
                    <button type="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"
                              aria-hidden="true"></span>
                        Add row
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

    

@endsection
