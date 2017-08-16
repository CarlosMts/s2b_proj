@extends('layouts.app')

@section('content')
<link href="{{ asset('css/dropzone/dropzone.css') }}" rel="stylesheet">




<script>

$(document).ready(function() {
      $(function(){
        $('#FillMyCompanyForm').click(function() {
            $('#company_name').val("CRU Corp.");
            $('#company_address').val("Rua de Pinto Bessa, 1090 25º Sala E");
            $('#company_zipcode').val("4250-290");
            $('#google-company').val("Porto, Portugal");
            $('#company_city').val("Porto");
            $('#company_country').val("Portugal");
            $('#company_nif').val("250040000");
            $('#company_person').val("Carlos Martins");
            $('#company_phone_number').val("918320188");

            $('#space_name').val("Carlão Cowork");
            $('#space_address').val("Avenida da Liberdade, 20 2 Esq");
            $('#space_zipcode').val("4150-200");
            $('#google-space').val("Lisboa, Portugal");
            $('#space_city').val("Porto");
            $('#space_country').val("Portugal");
            $('#TextArea').val("Texto de teste para descrição do espaço!");

            $("#open1").val('09:00');
            $("#close1").val('19:00');

            $("#open2").val('09:00');
            $("#close2").val('19:00');

            $("#open3").val('09:00');
            $("#close3").val('19:00');

            $("#open4").val('09:00');
            $("#close4").val('19:00');

            $("#open5").val('09:00');
            $("#close5").val('19:00');

            $("#open6").val('09:00');
            $("#close6").val('19:30');

            $("#open7").val('09:00');
            $("#close7").val('12:00');


            $("#hour_price1").val(12);
            $("#hour4_price1").val(20);
            $("#hour8_price1").val(35);

        }); 
    });
});

</script>




<div class="normal-centered-content-page">
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
        <form class="form-horizontal" role="form" method="POST" action="{{ route('space.store') }}" enctype="multipart/form-data">
        
        {{ csrf_field() }}
            
            
            <!-- Company Section -->
            <section id="company" class="company-section">
            <div class="container">
                    <h2>Empresa</h2>
                <div class="form-group">
                    <div class="col-sm-8">
                        @if(is_null($company))
                            <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" placeholder="Company Name" required autofocus>    
                        @else 
                            <input id="company_name" type="text" class="form-control" name="company_name" value="{{ $company->name }}" placeholder="Company Name" required autofocus>
                        @endif

                        @if ($errors->has('company_name'))  
                            <span class="help-block">
                                <strong>{{ $errors->first('company_name') }}</strong>
                            </span>
                        @endif
                    
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-sm-8">
                        @if(is_null($company))
                        <input id="company_address" type="text" class="form-control" name="company_address" value="{{ old('company_address') }}" placeholder="Company Address" required autofocus>
                        @else 
                        <input id="company_address" type="text" class="form-control" name="company_address" value="{{ $company->address }}" placeholder="Company Address" required autofocus>
                        @endif

                        @if ($errors->has('company_address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_address') }}</strong>
                            </span>
                        @endif
                    
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        @if(is_null($company))
                        <input id="company_zipcode" type="text" class="form-control" name="company_zipcode" value="{{ old('company_zipcode') }}" placeholder="C. Postal" required autofocus>
                        @else 
                        <input id="company_zipcode" type="text" class="form-control" name="company_zipcode" value="{{ $company->zipcode }}" placeholder="C. Postal" required autofocus>
                        @endif

                        @if ($errors->has('company_zipcode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_zipcode') }}</strong>
                            </span>
                        @endif
                    </div>

                  <div class="col-sm-6">
                        @if(is_null($company))
                        <input id="google-company" type="text" class="form-control" placeholder="City, Country" required autofocus/>

                        {{ Form::hidden('company_city', '', array('id' => 'company_city')) }}

                        {{ Form::hidden('company_country', '', array('id' => 'company_country')) }}

                        @else 
                        <input id="google-company" type="text" class="form-control" placeholder="City, Country" value="{{ $company->city . ', ' . $company->country }}"  required autofocus/>

                        {{ Form::hidden('company_city', $company->city, array('id' => 'company_city')) }}

                        {{ Form::hidden('company_country', $company->country, array('id' => 'company_country')) }}
                        @endif

                                
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        @if(is_null($company))
                        <input id="company_nif" type="text" class="form-control" name="company_nif" value="{{ old('company_nif') }}" placeholder="Company NIF" required autofocus>
                        @else 
                        <input id="company_nif" type="text" class="form-control" name="company_nif" value="{{ $company->nif }}" placeholder="Company NIF" required autofocus>
                        @endif

                        @if ($errors->has('company_nif'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_nif') }}</strong>
                            </span>
                        @endif
                    
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        @if(is_null($company))
                        <input id="company_person" type="text" class="form-control" name="company_person" value="{{ old('company_person') }}" placeholder="Person in charge" required autofocus>
                        @else 
                        <input id="company_person" type="text" class="form-control" name="company_person" value="{{ $company->person }}" placeholder="Person in charge" required autofocus>
                        @endif

                        @if ($errors->has('company_person'))  
                            <span class="help-block">
                                <strong>{{ $errors->first('company_person') }}</strong>
                            </span>
                        @endif
                    
                    </div>

                    <div class="col-sm-4">
                        @if(is_null($company))
                        <input id="company_phone_number" type="text" class="form-control" name="company_phone_number" value="{{ old('company_phone_number') }}" placeholder="Mobile phone" required autofocus>
                        @else 
                        <input id="company_phone_number" type="text" class="form-control" name="company_phone_number" value="{{ $company->phone_number }}" placeholder="Mobile phone" required autofocus>
                        @endif

                        @if ($errors->has('company_phone_number'))  
                            <span class="help-block">
                                <strong>{{ $errors->first('company_phone_number') }}</strong>
                            </span>
                        @endif
                    
                    </div>
                </div>

                <input type="button" value="Preencher Campos" id="FillMyCompanyForm" class="btn btn-secundary">

            </div>
            </section>

            <!-- Space Section -->
            <section id="space" class="space-section">
            <div class="container">
                <h2>Space Info</h2>
                <div class="container-half">
                    <div class="form-group">
                        <div class="col-lg-10">
                                
                            <input id="space_name" type="text" class="form-control" name="space_name" value="{{ old('space_name') }}" placeholder="Space name" required autofocus>

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
                                <option value="" selected>Space Type</option>
                            @foreach ($spacetypes as $key => $sp)
                                <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                            @endforeach

                        </select>

                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-10">
                            <input id="space_address" type="text" class="form-control" name="space_address" value="{{ old('space_address') }}" placeholder="Space Address" required autofocus>

                            @if ($errors->has('space_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('space_address') }}</strong>
                                </span>
                            @endif
                        
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            <input id="space_zipcode" type="text" class="form-control" name="space_zipcode" value="{{ old('space_zipcode') }}" placeholder="C. Postal" required autofocus>

                            @if ($errors->has('space_zipcode'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('space_zipcode') }}</strong>
                                </span>
                            @endif
                        </div>

                      <div class="col-sm-6">
                            <input id="google-space" type="text" class="form-control" placeholder="City, Country" required autofocus/>

                            {{ Form::hidden('space_city', '', array('id' => 'space_city')) }}

                            {{ Form::hidden('space_country', '', array('id' => 'space_country')) }}
                      </div>
                    </div>
                </div>
                <div class="container-half">
                  <div id="map"></div>
                  <div class="form-group">
                        <input type="hidden" class="form-control" id="lat" name="space_lat" value="{{ old('space_lat') }}" >
                        <input type="hidden" class="form-control" id="lng" name="space_lng" value="{{ old('space_lng') }}" >
                  </div>
                </div>
                

                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea rows="10" class="form-control" id="TextArea" name="space_description" placeholder="Insert a description about your space" required autofocus></textarea>
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
                            
                             @include('admin.Checklist.space_register_checklist') 

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
                              <tr>
                                <td>Segunda</td>
                                <td>
                                    <div class="form-group" id="sched1">
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control openHour" name="open[1]"  placeholder="09:00" id="open1" required autofocus>
                                                <span class="input-group-addon" >
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control closeHour" name="close[1]"  placeholder="18:00" id="close1" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_all_day[1]', 0)}}
                                        {{ Form::checkbox('is_all_day[1]', 1, false, ['id' => 'is_all_day1'] ) }}
                                        {{ Form::label('is_all_day1', ' ') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_closed_day[1]', 0)}}
                                        {{ Form::checkbox('is_closed_day[1]', 1, false, ['id' => 'is_closed1']) }}
                                        {{ Form::label('is_closed1', ' ') }}
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Terça</td>
                                <td>
                                    <div class="form-group" id="sched2">
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control openHour" name="open[2]"  placeholder="09:00" id="open2" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control closeHour" name="close[2]"  placeholder="18:00" id="close2" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_all_day[2]', 0)}}
                                        {{ Form::checkbox('is_all_day[2]', 1, false, ['id' => 'is_all_day2']) }}
                                        {{ Form::label('is_all_day2', ' ') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_closed_day[2]', 0)}}
                                        {{ Form::checkbox('is_closed_day[2]', 1, false, ['id' => 'is_closed2']) }}
                                        {{ Form::label('is_closed2', ' ') }}
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Quarta</td>
                                <td>
                                    <div class="form-group" id="sched3">
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control openHour" name="open[3]"  placeholder="09:00" id="open3" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control closeHour" name="close[3]"  placeholder="18:00" id="close3" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_all_day[3]', 0)}}
                                        {{ Form::checkbox('is_all_day[3]', 1, false, ['id' => 'is_all_day3']) }}
                                        {{ Form::label('is_all_day3', ' ') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_closed_day[3]', 0)}}
                                        {{ Form::checkbox('is_closed_day[3]', 1, false, ['id' => 'is_closed3']) }}
                                        {{ Form::label('is_closed3', ' ') }}
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Quinta</td>
                                <td>
                                    <div class="form-group" id="sched4">
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control openHour" name="open[4]"  placeholder="09:00" id="open4" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control closeHour" name="close[4]"  placeholder="18:00" id="close4" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_all_day[4]', 0)}}
                                        {{ Form::checkbox('is_all_day[4]', 1, false, ['id' => 'is_all_day4']) }}
                                        {{ Form::label('is_all_day4', ' ') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_closed_day[4]', 0)}}
                                        {{ Form::checkbox('is_closed_day[4]', 1, false, ['id' => 'is_closed4']) }}
                                        {{ Form::label('is_closed4', ' ') }}
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Sexta</td>
                                <td>
                                    <div class="form-group" id="sched5">
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control openHour" name="open[5]"  placeholder="09:00" id="open5" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control closeHour" name="close[5]"  placeholder="18:00" id="close5" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_all_day[5]', 0)}}
                                        {{ Form::checkbox('is_all_day[5]', 1, false, ['id' => 'is_all_day5']) }}
                                        {{ Form::label('is_all_day5', ' ') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_closed_day[5]', 0)}}
                                        {{ Form::checkbox('is_closed_day[5]', 1, false, ['id' => 'is_closed5']) }}
                                        {{ Form::label('is_closed5', ' ') }}
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Sábado</td>
                                <td>
                                    <div class="form-group" id="sched6">
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control openHour" name="open[6]"  placeholder="09:00" id="open6" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control closeHour" name="close[6]"  placeholder="18:00" id="close6" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_all_day[6]', 0)}}
                                        {{ Form::checkbox('is_all_day[6]', 1, false, ['id' => 'is_all_day6']) }}
                                        {{ Form::label('is_all_day6', ' ') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_closed_day[6]', 0)}}
                                        {{ Form::checkbox('is_closed_day[6]', 1, false, ['id' => 'is_closed6']) }}
                                        {{ Form::label('is_closed6', ' ') }}
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Domingo</td>
                                <td>
                                    <div class="form-group" id="sched7">
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control openHour" name="open[7]"  placeholder="09:00" id="open7" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control closeHour" name="close[7]"  placeholder="18:00" id="close7" required autofocus>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_all_day[7]', 0)}}
                                        {{ Form::checkbox('is_all_day[7]', 1, false, ['id' => 'is_all_day7']) }}
                                        {{ Form::label('is_all_day7', ' ') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-info checkbox-circle">
                                        {{ Form::hidden('is_closed_day[7]', 0)}}
                                        {{ Form::checkbox('is_closed_day[7]', 1, false, ['id' => 'is_closed7']) }}
                                        {{ Form::label('is_closed7', ' ') }}
                                    </div>
                                </td>
                              </tr>

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
                                <div class="tab-pane" id="alldays" role="tabpanel">
                                    <table class="table">
                                        <tr>
                                            <th style="min-width:120px;">Tipo</th>
                                            <th>Hora</th>
                                            <th>Pack 4h</th>
                                            <th>Pack 8h</th>
                                            <th>Mês</th>
                                        </tr>
                                        <tr>
                                            <td>Todos os dias</td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="hour_price[1]" id="hour_price1" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="hour4_price[1]" id="hour4_price1" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="hour8_price[1]" id="hour8_price1" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="month_price[1]" id="month_price1" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane" id="alternateprices" role="tabpanel">
                                    <table class="table">
                                        <tr>
                                            <th style="min-width:120px;">Tipo</th>
                                            <th>Hora</th>
                                            <th>Pack 4h</th>
                                            <th>Pack 8h</th>
                                            <th>Mês</th>
                                        </tr>
                                        <tr>
                                            <td>Semana</td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="hour_price[2]" id="hour_price2" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="hour4_price[2]" id="hour4_price2" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="hour8_price[2]" id="hour8_price2" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="month_price[2]" id="month_price2" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fim de Semana</td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="hour_price[3]" id="hour_price3" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="hour4_price[3]" id="hour4_price3" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="hour8_price[3]" id="hour8_price3" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group col-xs-12">
                                                    <div class="inner-addon right-addon">
                                                    <i class="glyphicon glyphicon-euro"></i>
                                                    <input type="text" class="form-control money" name="month_price[3]" id="month_price3" placeholder="Preço" autofocus/>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    </table>

                                    <div id="formAlert" class="alert alert-warning">  
                                        <a class="close">×</a>  
                                        <strong>Warning!</strong> Make sure the fields are filled correctly and try again.
                                    </div>

                                </div>
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
            <!-- Images Section -->
            <section id="images" class="images-section">
                <div class="container">
                    <!-- <h2>Images Section</h2>
                    <div class="form-group">
                        <div class="col-sm-12">

                            <div class="dropzone" id="mydropzone" name="mainFileUploader">
                                <div class="fallback">
                                    <input multiple="true" name="images[]" type="file">
                                </div>
                            </div>

                            <!-- <input name="files[]" type="file" multiple /> -->


                        <!-- </div>
                    </div> -->

                    <div class="row">
                        <h2>Images Section</h2>

                        <div class="dz-message">

                        </div>

                        <div class="dropzone dz-clickable dz-default dz-file-preview" id="mydropzone">
                            <div class="dz-message">
                                <h2><i class="glyphicon glyphicon-cloud-upload" style="font-size:35px;"></i><br>Drop photos here or click to upload</h2>
                            </div>
                            <div class="fallback">
                                <input multiple="true" name="images[]" type="file">
                            </div>
                            
                        </div>

                        <div class="dropzone-previews" id="dropzonePreview"></div>



                        <ul>
                            <li>Images are uploaded as soon as you drop them</li>
                            <li>Maximum allowed size of image is 2MB</li>
                        </ul>

                    </div>
                </div>
            </section>
            <div class="form-group">
                <div class="col-sm-10 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
                    <button type="button" class="btn btn-secundary" id="btn-check">CHECK JS</button>
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

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

        </form>

    </div>
    <!-- /.container -->

</div>

<!-- Scrolling Nav JavaScript -->
<!-- Input masks -->

<script type="text/javascript" src="{{ asset('/js/jquery.mask.min.js') }}"></script>

<script src="{{ asset('/js/google-city_input.js') }}"></script>
<script src="{{ asset('/js/google-maps.js') }}"></script>

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

            var spacetype=$('#space_type_select').val();

            var url = '{{ route("showCheckList", ":id") }}';
            url = url.replace(':id', spacetype);

            $('div.space_checklist_table-container').fadeOut();
            $('div.space_checklist_table-container').load(url, function() {
                    $('div.space_checklist_table-container').fadeIn();
                });
            });
    });
</script>

<script>
Dropzone.autoDiscover = false;

$( document ).ready(function () {
       
    dropzoneOptions = {
        url: "/",
        paramName: "images", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        maxFiles: 5,
        parallelUploads: 2,
        autoProcessQueue: false,
        uploadMultiple: false,
        addRemoveLinks: true,
        dictRemoveFile: 'Remove',
        dictFileTooBig: 'This image is bigger than 2MB',
        dictDefaultMessage: 'Drop photos here or click to uploadddd',

        // The setting up of the dropzone
        init:function() {

            var submitButton = document.querySelector("#btn-submit");
            var myDropzone = Dropzone.forElement(".dropzone");

            $('#btn-submit').click(function() {
                myDropzone.processQueue();
            });

            this.on("removedfile", function(file) {

                $.ajax({
                    type: 'POST',
                    url: 'upload/delete',
                    data: {id: file.name, _token: $('#csrf-token').val()},
                    dataType: 'html',
                    
                });

            } );

            this.on("success", function (file) {
                console.log("success > " + file.name);
            });

        },

        error: function(file, response) {
            if($.type(response) === "string")
                var message = response; //dropzone sends it's own error messages in string
            else
                var message = response.message;
            file.previewElement.classList.add("dz-error");
            _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
            _results = [];
            
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i];
                _results.push(node.textContent = message);
            }
            return _results;
        },

        success: function(file,done) {
            photo_counter++;
            $("#photoCounter").text( "(" + photo_counter + ")");
        }

    };

    var uploader = document.querySelector('#mydropzone');
    var newDropzone = new Dropzone(uploader, dropzoneOptions);


  });
</script>


@endsection