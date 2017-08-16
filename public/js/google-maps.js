
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

        // PINPOINT POR DEFEITO:
        var map = new google.maps.Map(document.getElementById("map"),{
            center:{
                lat: 41.1508597,
                lng: -8.593730999999934
            },
            zoom:15,
            mapTypeControlOptions: {
              mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                      'styled_map']
            }
        });

        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');

        var marker = new google.maps.Marker({
                    draggable: true,
                    position: {
                        lat: 41.1508597,
                        lng: -8.593730999999934
                    },
                    icon: '/images/icons/s2b-pinpoint_logo.png',
                    map: map
                });

        // PINPOINT LOCALIZAÇÃO ACTUAL
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (p) {
                var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);

                map.setCenter(LatLng);

                marker.setPosition(LatLng);

                google.maps.event.addListener(marker, "click", function (e) {
                    var infoWindow = new google.maps.InfoWindow();
                    infoWindow.setContent(marker.title);
                    infoWindow.open(map, marker);
                });

                google.maps.event.addListener(marker,'position_changed',function(){
                    var lat = marker.getPosition().lat();
                    var lng = marker.getPosition().lng();

                    $('#lat').val( lat );
                    $('#lng').val( lng );
                })
            });
        } else {
            alert('Geo Location feature is not supported in this browser.');
        }
        
        // ACTUALIZAR MAPA PELA MORADA INSERIDA
        var searchBox = new google.maps.places.SearchBox(document.getElementById('space_address'));

        google.maps.event.addListener(searchBox,'places_changed',function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            var input_address = document.getElementById('space_address');
            var input_zipcode = document.getElementById('space_zipcode');
            var input_city_country = document.getElementById('google-space');

            

            for(i=0; place=places[i];i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
            }

            for (var i=0; i<places[0].address_components.length; i++)
            {
                if (places[0].address_components[i].types[0] == "locality") {
                        //this is the object you are looking for
                        city = places[0].address_components[i];
                    }
                if (places[0].address_components[i].types[0] == "postal_code") {
                        //this is the object you are looking for
                        zipcode = places[0].address_components[i];
                    }
                if (places[0].address_components[i].types[0] == "country") {
                        //this is the object you are looking for
                        country = places[0].address_components[i];
                    }
            }

            map.fitBounds(bounds);
            map.setZoom(15);

            //This will get only the address
            input_address.value = places[0].name;
            //Get City, Country name
            input_city_country.value = city.long_name + ", " + country.long_name;
            //Get Zip Code
            input_zipcode.value = zipcode.short_name;

            $('#space_city').val( city.long_name );
            $('#space_country').val( country.long_name );

        });  

        google.maps.event.addListener(marker,'position_changed',function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val( lat );
            $('#lng').val( lng );
        });

    }

$(document).ready(function(){
    initMap();
});
