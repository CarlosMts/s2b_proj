@extends('layouts.admin')

@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Space Type</h2>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $spacetype->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Short Name:</strong>
                {{ $spacetype->short_name }}
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('spacetype.index') }}"> Back</a>
        </div>

    </div>


@endsection