@extends('layouts.app')

@section('content')

<script src="{{ asset('js/jssor.slider-25.0.6.min.js') }}"></script>



<script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
              $AutoPlay: 0,
              $SlideWidth: 640,
              $Cols: 2,
              $Align: 170,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*responsive code end*/
        });
    </script>

<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:350px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-004-double-tail-spin" style="position:absolute;top:0px;left:0px;text-align:center;background-color:rgba(0,0,0,0.7);"> 
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            
                @foreach ($spaceimages as $space_images)
                    <div>
                        <img data-u="image" src="{{ $space_images->img_name }}">
                    </div>
                @endforeach
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:45px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:45px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
</div>
<!-- #endregion Jssor Slider End -->

<div id="space-container">

         <div id="reserve-box">
            <div class="header">
                A sua reserva
            </div>

            <div class="body">
                <div id="reserve-box-container">
                    <div id="reserve-box-date-start">
                         <input class="input-data_reservation" id="datebegin" name="date" placeholder="Data Início" type="text"/>
                    </div>

                    <div id="reserve-box-date-end">
                         <input class="input-data_reservation" id="dateend" name="date" placeholder="Data Fim" type="text"/>
                    </div>
                   
                    <div class="reserve-box-div">
                          <select id="sp_hour_type">
                                <option value="">Select hour type</option>
                            @foreach ($spaceprices as $prices)
                                @if ($prices->type == 1 && $prices->have_price_check > 0 )
                                    @if ($prices->hour != 'n/a'  )
                                        <option value="1">Hourly</option>
                                    @endif
                                    @if ($prices->hour4 != 'n/a' )
                                        <option value="2">4 hours pack</option>
                                    @endif
                                    @if ($prices->hour8 != 'n/a' )
                                        <option value="3">8 hours pack</option>
                                    @endif
                                    @if ($prices->month != 'n/a' )
                                        <option value="4">month</option>
                                    @endif
                                @elseif ($prices->type == 2 && $prices->have_price_check > 0 )
                                    @if ($prices->hour != 'n/a'  )
                                        <option value="1">Hourly</option>
                                    @endif
                                    @if ($prices->hour4 != 'n/a' )
                                        <option value="2">4 hours pack</option>
                                    @endif
                                    @if ($prices->hour8 != 'n/a' )
                                        <option value="3">8 hours pack</option>
                                    @endif
                                    @if ($prices->month != 'n/a' )
                                        <option value="4">month</option>
                                    @endif
                                @endif
                            @endforeach
                          </select>
                    </div>
                    
                    <div class="reserve-box-div">
                        <div class="checkbox checkbox-info checkbox-circle">
                            <!-- CHECKBOX -->
                            <input id="is_checked" name="reserve_weekend" type="checkbox" value="false">
                            {{ Form::label('is_checked', 'Weekend included?') }}
                        </div>
                    </div>

                    <div class="reserve-box-div" style="text-align:right; margin-bottom: 25px;">
                        <p>Total</p>
                        <input type="text" disabled="disabled" name="reservation_price" id="reservation_price" value="">
                    </div>

                    <div class="footer">
                        <input type="button" id="reservation_make" class="reservation-button" value="Reservar" data-toggle="modal" data-space="{{ $spaceinfo[0]->id }}" data-dataInicio="" data-dataFim="" data-hourType="" data-weekend="0" data-price="">
                    </div>
                </div>
            </div>

        </div>
    

        <section id="space-info-section" class="space-info-section">
            <div id="space-container-inside">
                <h5>{{ $spaceinfo[0]->name }} - {{ $spaceinfo[0]->type_name }}</h5> 
                <p>{{ $spaceinfo[0]->address }}</p>
                <p>{{ $spaceinfo[0]->zipcode }}, {{ $spaceinfo[0]->city }}</p>

                {{ Form::hidden('invisible', $spaceinfo[0]->id, array('id' => 'spaceID' )) }}
                {{ Form::hidden('invisible', $spaceinfo[0]->name, array('id' => 'spaceNAME' )) }}
            </div>
        </section>

        <section id="space-about-section" class="space-about-section">
            <div id="space-container-inside">
            <h2>About this space</h2> 

            <div class="row" style="padding:20px 0;">
                @foreach ($spaceimages as $space_images)
                <div class="column">
                    <img class="hover-shadow cursor" style="width:100%" onclick="openModal();currentSlide(1)" src="{{ $space_images->img_thumb }}">
                </div>
                @endforeach
            </div>


            <div id="galleryModal" class="modal">
              <span class="close cursor" onclick="closeModal()">&times;</span>
              <div class="modal-content">

                @foreach ($spaceimages as $space_images)
                <div class="mySlides">
                    <img style="width:100%" src="{{ $space_images->img_name }}">
                </div>
                @endforeach
                
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                @foreach ($spaceimages as $space_images)
                <div class="column">
                  <img class="demo cursor" src="{{ $space_images->img_thumb }}" style="width:100%" onclick="currentSlide(1)">
                </div>
                @endforeach
              </div>
            </div>

            <h3>Description</h3>
            <p>{{ $spaceinfo[0]->description }}</p>

            <h3>Checklist</h3>

            <ul class="list-columns">
            
            @foreach ($spacechecklist as $checklist)
            
                @if ($checklist->status == 0)
                    <li style="text-decoration: line-through; opacity: .4;">
                        <div class="input-w">
                            {{ $checklist->description }}
                        </div>
                    </li>  
                    
                @else
                    <li>
                        <div class="input-w">
                            <span class="glyphicon glyphicon-ok-circle"></span> {{ $checklist->description }} <span style="font-size:13px;color:#A0A0A0;">{{ $checklist->value }} {{ $checklist->label }}</span>
                        </div>
                    </li>  
                    
                @endif
            @endforeach

            </ul>

            </div>
        </section>

        <section id="space-schedule-section" class="space-schedule-section">
            <div id="space-double-container-inside">

                <div id="schedule-table">
                <h2>Schedule</h2> 
                    <table id="schedule-table" class="table table-list">
                        <tbody>
                            @foreach ($spaceschedule as $schedule)
                                <tr>
                                    <td style="font-weight: 700;">
                                    @if ( $schedule->week_day == 1 )
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
                                    @endif
                                    </td>
                                    <td>
                                    @if ( $schedule->all_day == 1 )
                                        Aberto 24h
                                    @elseif  ( $schedule->closed == 1 )
                                        Fechado
                                    @else
                                        {{ $schedule->open_hour }} - {{ $schedule->close_hour }}
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>  
                </div>

                <div id="price-table">
                    <h2>Prices</h2>  

                    @foreach ($spaceprices as $prices)
                        @if ($prices->type == 1 && $prices->have_price_check > 0 )
                            <p>Todos os dias</p>
                            <input id="price_type" name="price_type" type="hidden" value="{{ $prices->type }}">
                            <div class="price_square">
                                <p>
                                <input type="text" disabled="disabled" name="t1_1" id="t1_1" value="{{ $prices->hour }}">
                                </br> <span style="font-size:9px;font-weight: 300 !important;">€ / hour</span></p>
                            </div>
                            <div class="price_square">
                                <p>
                                <input type="text" disabled="disabled" name="t1_2" id="t1_2" value="{{ $prices->hour4 }}">
                                </br> <span style="font-size:9px;font-weight: 300 !important;">€ / pack 4h</span></p>
                            </div>
                            <div class="price_square">
                                <p>
                                <input type="text" disabled="disabled" name="t1_3" id="t1_3" value="{{ $prices->hour8 }}">
                                </br> <span style="font-size:9px;font-weight: 300 !important;">€ / pack 8h</span></p>
                            </div>
                            <div class="price_square">
                                <p>
                                <input type="text" disabled="disabled" name="t1_4" id="t1_4" value="{{ $prices->month }}">
                                </br> <span style="font-size:9px;font-weight: 300 !important;">€ / month</span></p>
                            </div>
                        @elseif ($prices->type == 2 && $prices->have_price_check > 0 )
                            <p>Semana</p>
                            <input id="price_type" name="price_type" type="hidden" value="{{ $prices->type }}">
                            <div class="price_square">
                                <p>
                                <input type="text" disabled="disabled" name="t2_1" id="t2_1" value="{{ $prices->hour }}">
                                </br> <span style="font-size:9px;font-weight: 300 !important;">€ / hour</span></p>
                            </div>
                            <div class="price_square">
                                <p>
                                <input type="text" disabled="disabled" name="t2_2" id="t2_2" value="{{ $prices->hour4 }}">
                                </br> <span style="font-size:9px;font-weight: 300 !important;">€ / pack 4h</span></p>
                            </div>
                            <div class="price_square">
                                <p>
                                <input type="text" disabled="disabled" name="t2_3" id="t2_3" value="{{ $prices->hour8 }}">
                                </br> <span style="font-size:9px;font-weight: 300 !important;">€ / pack 8h</span></p>
                            </div>
                            <div class="price_square">
                                <p>
                                <input type="text" disabled="disabled" name="t2_4" id="t2_4" value="{{ $prices->month }}">
                                </br> <span style="font-size:9px;font-weight: 300 !important;">€ / month</span></p>
                            </div>
                        @elseif ($prices->type == 3 && $prices->have_price_check > 0 )
                            <p>Fim de Semana</p>
                            <div class="price_square">
                                <p>
                                <input type="text" disabled="disabled" name="t3_1" id="t3_1" value="{{ $prices->hour }}">
                                </br> <span style="font-size:9px;font-weight: 300 !important;">€ / hour</span></p>
                            </div>
                            <div class="price_square">
                                <p>
                                <input type="text" disabled="disabled" name="t3_2" id="t3_2" value="{{ $prices->hour4 }}">
                                </br> <span style="font-size:9px;font-weight: 300 !important;">€ / pack 4h</span></p>
                            </div>
                            <div class="price_square">
                                <p>
                                <input type="text" disabled="disabled" name="t3_3" id="t3_3" value="{{ $prices->hour8 }}">
                                </br> <span style="font-size:9px;font-weight: 300 !important;">€ / pack 8h</span></p>
                            </div>
                            <div class="price_square">
                                <p>
                                <input type="text" disabled="disabled" name="t3_4" id="t3_4" value="{{ $prices->month }}">
                                </br> <span style="font-size:9px;font-weight: 300 !important;">€ / month</span></p>
                            </div>
                        @endif
                    @endforeach
                    
                </div>
                
            </div>
        
        </section>

        @if ($spacecomments != null)
        <section id="space-comments-section">
            <div id="space-container-inside">
                <h2>Comments</h2>
            </div>
        </section>
        @endif
</div>
        <section id="space-map-section">
            <div id="spaceMap"></div>
            <div>
                <input type="hidden" class="form-control" id="lat" name="space_lat" value="{{ $spaceinfo[0]->space_lat }}" >
                <input type="hidden" class="form-control" id="lng" name="space_lng" value="{{ $spaceinfo[0]->space_lng }}" >
            </div>
        </section>

        @if ( Auth::user()->is_admin>=10 && $spaceinfo[0]->admin_reviewed==0 )
        <div class="panel-footer">

        <div class="row">
            <div class="col col-xs-12">
                <div class="pull-right" style="padding-right:20px;">
                    {!! Form::open(['method' => 'PUT','route' => ['acceptspace', $spaceinfo[0]->id],'style'=>'display:inline']) !!}

                        <button type="submit" class="btn btn-primary" id="accept-btn">Accept</button>
                    {{ Form::close() }}
                    

                    <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>

        </div>
        @endif

<!-- Scripts -->
<script type="text/javascript">
$(function() {
  $('select').selectric();
});
</script>

<script src="{{ asset('/js/google-maps-space.js') }}"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjGoTuUHrw1uzD0n-fOEq7URdFA1ALbcE&callback=initMapSpace">
</script>

<script src="{{ asset('/js/reserve_box_move.js') }}"></script>

@include('modals.reservation_make')


@endsection