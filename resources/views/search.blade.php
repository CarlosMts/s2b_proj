@extends('layouts.app')

@section('content')
<!-- CSRF Token -->
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">

	

<div id="full-size">
    
    <!-- MAP AREA -->
	<div id="mapArea-left"></div>

	<!-- LIST SPACES AREA -->
	<div class="listArea-right">
		<!-- SEARCH BAR -->
	    <div class="horizontal-search-bar">

			<div class="space_search"> 
				<input class="input-space_search-city" name="search_name" type="text" id="search_city" placeholder="City name" value="{{ $search_city }}"> 
			</div>

			<div class="spacetype_search">
	            <select class="form-control" name="space_type" id="space_type_select" required autofocus>
	                    
                        <option value="{{ $currentspacetype[0]->id }}">{{ $currentspacetype[0]->name }}</option>
	                @foreach ($spacetypes as $key => $sp)
	                    <option value="{{ $sp->id }}">{{ $sp->name }}</option>
	                @endforeach

	            </select>
	        </div>

	        <div class="spacecalendar_search"> 
	        </div>

	        <!-- <div class="spaceordering_search"> 
	        	<div class="search-dropdown">
					<button class="search-dropbtn">Sort by</button>
						<div class="search-dropdown-content">
				    		<a href="#">Recommended places</a>
				    		<a href="#">Price - Low to High</a>
				    		<a href="#">Price - High to Low</a>
				  		</div>
				</div>
	        </div> -->

	        <div class="spacefilters_search"> 
				<button class="more-filter-btn" onclick="toggle();">
					<i class="fa fa-filter" aria-hidden="true"></i> Filters
				</button>
	        </div>

		</div>

		<div id="filters-panel">asdf</div>

        @if(isset($details))
		<div class="horizontal-count-results">
			<div class="div-left">{{ $count_spaces }} resultados</div>
			<div class="div-right">Order by: Price</div>
		</div>
		@endif

		<div class="show-results">
			@include('search-list')
		</div>
		

	</div>

	

</div>





<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjGoTuUHrw1uzD0n-fOEq7URdFA1ALbcE&callback=initMap&libraries=places">
</script>

<script>
function initMap() {

        var styledMapType = new google.maps.StyledMapType(
        [
            {
                "featureType": "administrative",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "lightness": 33
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "labels",
                "stylers": [
                    {
                        "saturation": "-100"
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "labels.text",
                "stylers": [
                    {
                        "gamma": "0.75"
                    }
                ]
            },
            {
                "featureType": "administrative.neighborhood",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "lightness": "-37"
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f9f9f9"
                    }
                ]
            },
            {
                "featureType": "landscape.man_made",
                "elementType": "geometry",
                "stylers": [
                    {
                        "saturation": "-100"
                    },
                    {
                        "lightness": "40"
                    },
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "landscape.natural",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "saturation": "-100"
                    },
                    {
                        "lightness": "-37"
                    }
                ]
            },
            {
                "featureType": "landscape.natural",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "saturation": "-100"
                    },
                    {
                        "lightness": "100"
                    },
                    {
                        "weight": "2"
                    }
                ]
            },
            {
                "featureType": "landscape.natural",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "saturation": "-100"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                    {
                        "saturation": "-100"
                    },
                    {
                        "lightness": "80"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels",
                "stylers": [
                    {
                        "saturation": "-100"
                    },
                    {
                        "lightness": "0"
                    }
                ]
            },
            {
                "featureType": "poi.attraction",
                "elementType": "geometry",
                "stylers": [
                    {
                        "lightness": "-4"
                    },
                    {
                        "saturation": "-100"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#c5dac6"
                    },
                    {
                        "visibility": "on"
                    },
                    {
                        "saturation": "-95"
                    },
                    {
                        "lightness": "62"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "all",
                "stylers": [
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [
                    {
                        "saturation": "-100"
                    },
                    {
                        "gamma": "1.00"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.text",
                "stylers": [
                    {
                        "gamma": "0.50"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "saturation": "-100"
                    },
                    {
                        "gamma": "0.50"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#c5c6c6"
                    },
                    {
                        "saturation": "-100"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "lightness": "-13"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "lightness": "0"
                    },
                    {
                        "gamma": "1.09"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#e4d7c6"
                    },
                    {
                        "saturation": "-100"
                    },
                    {
                        "lightness": "47"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "lightness": "-12"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "saturation": "-100"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#fbfaf7"
                    },
                    {
                        "lightness": "77"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "lightness": "-5"
                    },
                    {
                        "saturation": "-100"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "saturation": "-100"
                    },
                    {
                        "lightness": "-15"
                    }
                ]
            },
            {
                "featureType": "transit.station.airport",
                "elementType": "geometry",
                "stylers": [
                    {
                        "lightness": "47"
                    },
                    {
                        "saturation": "-100"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#acbcc9"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "saturation": "53"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "lightness": "-42"
                    },
                    {
                        "saturation": "17"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "lightness": "61"
                    }
                ]
            }
        ],
        {name: 'Styled Map'});


        map = new google.maps.Map(document.getElementById("mapArea-left"),{
            center: {
                        lat: 41.1508597,
                        lng: -8.593730999999934
            },
            zoom:15,
            scrollwheel: true,
            navigationControl: false,
            mapTypeControl: false,
            scaleControl: true,
            draggable: true,
            mapTypeControlOptions: {
              mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                      'styled_map']
            }
        });

        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');

        bounds  = new google.maps.LatLngBounds();

        var locations = [
            @foreach ($list as $space)
              [{{$space->lat}}, {{$space->lng}}],
            @endforeach
        ];

        for (i = 0; i < locations.length; i++) {
            var location = new google.maps.LatLng(locations[i][0], locations[i][1]);

            var marker = new google.maps.Marker({
                draggable: false,
                position: location,
                icon: '/images/icons/s2b-pinpoint_logo.png',
                map: map,
            }); 

            //Auto-center and auto-zoom
            loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
			bounds.extend(loc);
        }

            map.fitBounds(bounds);      //auto-zoom
			map.panToBounds(bounds);     //auto-center

      }

      $(document).ready(function(){
            initMap();

   

			// map.addListener('idle', function() {
			// 	var currentBounds = map.getBounds();
			// 	var NE = currentBounds.getNorthEast();
			// 	var SW = currentBounds.getSouthWest();

	  //         	// send map bounds coordinates to filter new results

			// 	var CSRF_TOKEN = '{{ csrf_token() }}';

			// 	var myJsonData = {
			// 	    	'name' : $('#spacename').text(),
		 //        		'NElat' : NE.lat(),
		 //        		'NElng' : NE.lng(),
		 //        		'SWlat' : SW.lat(),
		 //        		'SWlng' : SW.lng()
		 //        	}
			// 	$.get('maprefresh', myJsonData, function(data) {
			// 	    console.log(data);

			// 	    $('div.listArea-right').load('{{ route("maprefresh") }}', function() {
   //                      $('div.listArea-right').fadeIn();
   //                  });
			// 	});

				
	  //});
        });

</script>

<script>
  var toggle = function() {
  var mydiv = document.getElementById('filters-panel');
  if (mydiv.style.display == 'block' )
    mydiv.style.display = 'none';
  else
    mydiv.style.display = 'block';
  }
</script>

@endsection