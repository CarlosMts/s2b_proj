@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        
        <h2>Search Space details</h2>
        @if(isset($details))
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left" style="padding-bottom:20px;">
                        <p> The Search results for your query <b> {{ $query }} </b> are:</p>
                    </div>
                </div>
            </div>
            
            <div class="panel panel-default panel-table">
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                            <tr>
                                <th style="width:16%; text-align:left;">Space Name</th>
                                <th style="width:16%">Space Type</th>
                                <th style="width:16%">City</th>
                                <th style="width:16%">Company</th>
                                <th style="width:16%">Person in charge</th>
                                <th style="width:16%">Phone number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $space)
                            <tr>
                                <td>{{$space->space_name}}</td>
                                <td>{{$space->type_name}}</td>
                                <td>{{$space->city}}</td>
                                <td>{{$space->company_name}}</td>
                                <td>{{$space->person}}</td>
                                <td>{{$space->phone_number}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @elseif(isset($message))
            

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left" style="padding-bottom:20px;">
                        <p>{{ $message }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if(isset($details))
    <div class="panel-footer" style="background-color:transparent;">
        <div class="row">
            <div class="col col-xs-offset-3 col-xs-6">
                <nav aria-label="Page navigation" class="text-center">
                    {!! $details->render() !!}
                </nav>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection