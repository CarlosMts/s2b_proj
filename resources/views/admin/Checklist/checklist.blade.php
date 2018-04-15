@extends('layouts.admin')

@section('content')
<div class="admin-content">
<h2>Checklist</h2>

<form class="form-horizontal" role="form" method="POST" action="{{ route('spacetypechecklist.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="col-md-4">
        <div class="panel panel-default panel-table">

            <div class="panel-body">
                <table id="mytable" class="table table-striped table-bordered table-list">
                    <thead>
                    <tr>
                        <th class="col-text" style="width: 220px;">Space Type</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($spacetypes as $key => $sp)
                    <tr>
                        <td>{{ $sp->short_name }}</td>
                        <td>
                            <div class="radio radio-info">
                                <input type="radio" name='type_id' id='radio{{ $sp->id }}' value='{{ $sp->id }}' >
                                <label for='radio{{ $sp->id }}'> 
                                    
                                </label>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

    <div class="col-md-8">
        <div class="panel panel-default panel-table">

            <div class="panel-body">
                <div class="table-container">
                    
                    @include('admin.Checklist.table_spacetype_checklist')

                </div>
            </div>

        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-10 col-md-offset-4">
            <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
        </div>
    </div>    

</form>


</div> 
@endsection
