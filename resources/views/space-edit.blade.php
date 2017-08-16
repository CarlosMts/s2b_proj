@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center" style="padding-left:50px;">
                <h2>Edit {{ $spaceinfo[0]->space_name }} info</h2>
            </div>
        </div>
    </div>

    <!-- ............ BEGIN OF NEW SPACE EDIT BLOCK .............. -->

    <div class="normal-centered-content-page">

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

    <div id="city_alert" class="alert alert-warning alert-dismissable fade in" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> Please insert a City and a Country. Ex: Porto, Portugal
    </div>

    <!-- Navigation -->
    <div class="container">
        <ul class="navbar-content">
            <li>
                <a class="page-scroll" href="#company">Empresa</a>
            </li>
            <li>
                <a class="page-scroll" href="#space">Espaço</a>
            </li>
            <li>
                <a class="page-scroll" href="#schedule">Horário</a>
            </li>
            <li>
                <a class="page-scroll" href="#prices">Preços</a>
            </li>
            <li>
                <a class="page-scroll" href="#images">Imagens</a>
            </li>
        </ul>

        <form class="form-horizontal" role="form" method="POST" action="{{ route('space-update', $spaceinfo[0]->id) }}" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PATCH">

        {{ csrf_field() }}
            
            
        <!-- Company Section -->
        <section id="company" class="company-section">
        <div class="container">
                <h2>Empresa</h2>
            <div class="form-group">
                <div class="col-sm-8">

                    <input id="company_name" type="text" class="form-control" name="company_name" value="{{ $spacecompany[0]->company_name }}" placeholder="Company Name" required autofocus>

                    @if ($errors->has('company_name'))  
                        <span class="help-block">
                            <strong>{{ $errors->first('company_name') }}</strong>
                        </span>
                    @endif
                
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-8">
                    <input id="company_address" type="text" class="form-control" name="company_address" value="{{ $spacecompany[0]->company_address }}" placeholder="Company Address" required autofocus>

                    @if ($errors->has('company_address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('company_address') }}</strong>
                        </span>
                    @endif
                
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2">

                    <input id="company_zipcode" type="text" class="form-control" name="company_zipcode" value="{{ $spacecompany[0]->company_zipcode }}" placeholder="C. Postal" required autofocus>

                    @if ($errors->has('company_zipcode'))
                        <span class="help-block">
                            <strong>{{ $errors->first('company_zipcode') }}</strong>
                        </span>
                    @endif
                </div>

              <div class="col-sm-6">

                    <input id="google-company" type="text" class="form-control" placeholder="City, Country" value="{{ $spacecompany[0]->company_city . ', ' . $spacecompany[0]->company_country }}"  required autofocus/>

                    {{ Form::hidden('company_city', $spacecompany[0]->company_city, array('id' => 'company_city')) }}

                    {{ Form::hidden('company_country', $spacecompany[0]->company_country, array('id' => 'company_country')) }}

              </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <input id="company_nif" type="text" class="form-control" name="company_nif" value="{{ $spacecompany[0]->company_nif }}" placeholder="Company NIF" required autofocus>

                    @if ($errors->has('company_nif'))
                        <span class="help-block">
                            <strong>{{ $errors->first('company_nif') }}</strong>
                        </span>
                    @endif
                
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">

                    <input id="company_person" type="text" class="form-control" name="company_person" value="{{ $spacecompany[0]->company_person }}" placeholder="Person in charge" required autofocus>

                    @if ($errors->has('company_person'))  
                        <span class="help-block">
                            <strong>{{ $errors->first('company_person') }}</strong>
                        </span>
                    @endif
                
                </div>

                <div class="col-sm-4">
                    <input id="company_phone_number" type="text" class="form-control" name="company_phone_number" value="{{ $spacecompany[0]->company_phone_number }}" placeholder="Mobile phone" required autofocus>

                    @if ($errors->has('company_phone_number'))  
                        <span class="help-block">
                            <strong>{{ $errors->first('company_phone_number') }}</strong>
                        </span>
                    @endif
                
                </div>
            </div>
        </div>
        </section>

        <!-- Space Section -->
        <section id="space" class="space-section">
        <div class="container">
            <h2>Space Info</h2>
            <div class="container-half">
                <div class="form-group">
                    <div class="col-lg-10">
                            
                        {{ Form::hidden('space-id', $spaceinfo[0]->id, array('id'=>'space-id')) }}
                        <input id="space_name" type="text" class="form-control" name="space_name" value="{{ $spaceinfo[0]->space_name }}" placeholder="Space name" required autofocus>

                        @if ($errors->has('space_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('space_name') }}</strong>
                            </span>
                        @endif
            
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6">

                    <select class="form-control" name="space_type" id="space_type_select" required autofocus>
                            <option value="{{ $spaceinfo[0]->space_type_id }}" selected>{{ $spaceinfo[0]->space_type }}</option>
                        @foreach ($spacetypes as $key => $sp)
                            <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                        @endforeach

                    </select>

                    </div>
                </div>

                <div class="form-group">

                    <div class="col-sm-10">
                        <input id="space_address" type="text" class="form-control" name="space_address" value="{{ $spaceinfo[0]->space_address }}" placeholder="Space Address" required autofocus>

                        @if ($errors->has('space_address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('space_address') }}</strong>
                            </span>
                        @endif
                    
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <input id="space_zipcode" type="text" class="form-control" name="space_zipcode" value="{{ $spaceinfo[0]->space_zipcode }}" placeholder="C. Postal" required autofocus>

                        @if ($errors->has('space_zipcode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('space_zipcode') }}</strong>
                            </span>
                        @endif
                    </div>

                  <div class="col-sm-6">
                        <input id="google-space" type="text" class="form-control" placeholder="City, Country" value="{{ $spaceinfo[0]->space_city . ', ' . $spaceinfo[0]->space_country }}"  required autofocus/>

                        {{ Form::hidden('space_city', $spaceinfo[0]->space_city, array('id' => 'space_city')) }}

                        {{ Form::hidden('space_country', $spaceinfo[0]->space_country, array('id' => 'space_country')) }}
                  </div>
                </div>
            </div>
            <div class="container-half">
              <div id="map"></div>
              <div class="form-group">
                    <input type="hidden" class="form-control" id="lat" name="space_lat" value="{{ $spaceinfo[0]->space_lat }}" >
                    <input type="hidden" class="form-control" id="lng" name="space_lng" value="{{ $spaceinfo[0]->space_lng }}" >
              </div>
            </div>
            

            <div class="form-group">
                <div class="col-sm-12">
                    <textarea rows="10" class="form-control" id="TextArea" name="space_description" placeholder="Insert a description about your space" required autofocus> {{ $spaceinfo[0]->space_description }} </textarea>
                </div>
            </div>

        </div>    
        </section>

        <!-- Checklist Section -->
        <section id="checklist" class="checklist-section">
            <div class="container">
                <h2>Checklist Section</h2>

                <div class="panel-body">
                    <div class="space_checklist_table-container">
                        
                         @include('admin.Checklist.space_edit_checklist') 

                    </div>
                </div>
            </div>
        </section>

        <!-- Schedule Section -->
        <section id="schedule" class="schedule-section">
            <div class="container">
                <h2>Schedule Section</h2>
                <div class="form-group">
                    <div class="col-sm-12">

                        <table class="table">
                          <tr>
                            <th style="min-width:120px;">Days</th>
                            <th>Schedule</th>
                            <th>Is 24h open?</th>
                            <th>Is closed?</th>
                          </tr>
                          @foreach ($spaceschedule as $schedule)
                          <tr>
                            <td> @if ( $schedule->week_day == 1 )
                                    Segunda
                                @elseif  ( $schedule->week_day == 2 )
                                    Terça
                                @elseif  ( $schedule->week_day == 3 )
                                    Quarta
                                @elseif  ( $schedule->week_day == 4 )
                                    Quinta
                                @elseif  ( $schedule->week_day == 5 )
                                    Sexta
                                @elseif  ( $schedule->week_day == 6 )
                                    Sábado
                                @elseif  ( $schedule->week_day == 7 )
                                    Domingo
                                @endif </td>
                            <td>
                                @if ( $schedule->all_day == 1 || $schedule->closed == 1 )
                                <div class="form-group" id="sched{{ $schedule->week_day }}" style="display: none;">
                                @else
                                <div class="form-group" id="sched{{ $schedule->week_day }}" style="display: block;">
                                @endif
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control openHour" name="open[{{ $schedule->week_day }}]"  placeholder="09:00" id="open{{ $schedule->week_day }}" value="{{ $schedule->open_hour }}" required autofocus>
                                            <span class="input-group-addon" >
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control closeHour" name="close[{{ $schedule->week_day }}]"  placeholder="18:00" id="close{{ $schedule->week_day }}" value="{{ $schedule->close_hour }}" required autofocus>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-info checkbox-circle">
                                    {{ Form::hidden('is_all_day['. $schedule->week_day .']', 0)}}
                                    {{ Form::checkbox('is_all_day['. $schedule->week_day .']', 1, $schedule->all_day, ['id' => 'is_all_day'.$schedule->week_day ] ) }}
                                    {{ Form::label('is_all_day'. $schedule->week_day, ' ') }}
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-info checkbox-circle">
                                    {{ Form::hidden('is_closed_day['. $schedule->week_day .']', 0)}}
                                    {{ Form::checkbox('is_closed_day['. $schedule->week_day .']', 1, $schedule->closed, ['id' => 'is_closed'.$schedule->week_day ]) }}
                                    {{ Form::label('is_closed'. $schedule->week_day, ' ') }}
                                </div>
                            </td>
                          </tr>
                          @endforeach

                        </table>
                    
                    </div>
                </div>
            </div>
        </section>

        <!-- Prices Section -->
        <section id="prices" class="prices-section">
            <div class="container">
                <h2>Prices Section</h2>
                <div class="form-group">
                    <div class="col-sm-12" style="height:200px;">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#alldays" role="tab" aria-controls="alldays">Todos os dias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#alternateprices" role="tab" aria-controls="alternateprices">Preços Alternados</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            @foreach ($spaceprices as $sp)
                                @if ( $sp->type == 1 )
                                <div class="tab-pane" id="alldays" role="tabpanel">
                                    <table class="table">
                                        <tr>
                                            <th style="min-width:120px;">Tipo</th>
                                            <th>Hora</th>
                                            <th>Pack 4h</th>
                                            <th>Pack 8h</th>
                                            <th>Mês</th>
                                        </tr>
                                @elseif ( $sp->type == 2 )
                                <div class="tab-pane" id="alternateprices" role="tabpanel">
                                    <table class="table">
                                        <tr>
                                            <th style="min-width:120px;">Tipo</th>
                                            <th>Hora</th>
                                            <th>Pack 4h</th>
                                            <th>Pack 8h</th>
                                            <th>Mês</th>
                                        </tr>
                                @endif
                                        <tr>
                                            <td>
                                                @if ( $sp->type == 1 )
                                                    Todos os dias
                                                @elseif  ( $sp->type == 2 )
                                                    Semana
                                                @elseif  ( $sp->type == 3 )
                                                    Fim de Semana
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="hour_price[{{ $sp->type }}]" id="hour_price{{$sp->type}}" value="{{ $sp->hour }}" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="hour4_price[{{$sp->type}}]" id="hour4_price{{$sp->type}}" value="{{ $sp->hour4 }}" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="hour8_price[{{$sp->type}}]" id="hour8_price{{$sp->type}}" value="{{ $sp->hour8 }}" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="month_price[{{$sp->type}}]" id="month_price{{$sp->type}}" value="{{ $sp->month }}" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    
                                @if ( $sp->type == 1 )
                                    </table>
                                </div>
                                @elseif ( $sp->type == 3 )
                                    </table>

                                    <div id="formAlert" class="alert alert-warning">  
                                        <a class="close">×</a>  
                                        <strong>Warning!</strong> Make sure the fields are filled correctly and try again.
                                    </div>

                                </div>
                                @endif
                            @endforeach
                        </div>

                        <script>
                          $(function () {
                            $('#myTab a:first').tab('show')
                          })
                        </script>
                    
                    </div>
                </div>
            </div>
        </section>    

            

        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('myspaces') }}"> Back</a>
            <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
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

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        {!! Form::close() !!}

    </div>
    <!-- /.container -->

</div>

    <!-- ............  END OF NEW SPACE EDIT BLOCK  .............. -->

<!-- Scrolling Nav JavaScript -->
<!-- Input masks -->
<script type="text/javascript" src="{{ asset('/js/jquery.mask.min.js') }}"></script>

<script src="{{ asset('/js/google-city_input.js') }}"></script>
<script src="{{ asset('/js/google-maps-edit.js') }}"></script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjGoTuUHrw1uzD0n-fOEq7URdFA1ALbcE&callback=initMap&libraries=places">
</script>

<script src="{{ asset('/js/space_register_validation.js') }}"></script>
<script src="{{ asset('/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('/js/scrolling-nav.js') }}"></script>
<script src="{{ asset('/js/dropzone/dropzone.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
        $('#space_type_select').change(function(){

            var spaceid=$('#space-id').val();
            var spacetype=$('#space_type_select').val();
            
            var url = '{{ route("showSpaceCheckList", [":id", ":typeid"] ) }}';

            url = url.replace(':id', spaceid);
            url = url.replace(':typeid', spacetype);

            $('div.space_checklist_table-container').fadeOut();
            $('div.space_checklist_table-container').load(url, function() {
                    $('div.space_checklist_table-container').fadeIn();
                });
            });
    });
</script>

@endsection