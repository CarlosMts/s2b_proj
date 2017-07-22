@extends('layouts.admin')

@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Space Type</h2>
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

    {!! Form::open(array('route' => 'spacetype.store','method'=>'POST')) !!}
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::text('name', null, array('placeholder' => 'Space Type','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::text('short_name', null, array('placeholder' => 'Short Name','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('spacetype.index') }}"> Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection