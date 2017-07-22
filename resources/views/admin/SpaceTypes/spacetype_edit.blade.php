@extends('layouts.admin')

@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Space Type</h2>
            </div>
        </div>
    </div>

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

    {!! Form::model($spacetype, ['method' => 'PATCH','route' => ['spacetype.update', $spacetype->id]]) !!}
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Space Type Name','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Short Name:</strong>
                {!! Form::text('short_name', null, array('placeholder' => 'Space Type Short Name','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('spacetype.index') }}"> Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection