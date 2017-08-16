@extends('layouts.app')

@section('content')
    <h2>Teste Mapa</h2>
        <input type="text" class="form-control" name="lat" id="searchmap">
      <div id="map"></div>
      <div class="form-group">
            <input type="text" class="form-control" name="lat" id="lat">
            <input type="text" class="form-control" name="lng" id="lng">
      </div>
        <script>
            function initMap() {

            var map = new google.maps.Map(document.getElementById("map"),{
                center:{
                    lat: 41.1508597,
                    lng: -8.593730999999934
                },
                zoom:15
            });

            var marker = new google.maps.Marker({
                        draggable: true,
                        position: {
                            lat: 41.1508597,
                            lng: -8.593730999999934
                        },
                        icon: '/images/icons/s2b-pinpoint_logo.png',
                        map: map
                    });

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
            

            // if (navigator.geolocation) {
            //     navigator.geolocation.getCurrentPosition(function (p) {
            //         var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);

            //         var mapOptions = {
            //             zoom: 15,
            //             center: LatLng,
            //             mapTypeId: google.maps.MapTypeId.ROADMAP
            //         };

            //         var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            //         var marker = new google.maps.Marker({
            //             draggable: true,
            //             position: LatLng,
            //             icon: '/images/icons/s2b-pinpoint_logo.png',
            //             map: map,
            //             title: "<div style = 'height:60px;width:200px'><b>Your location:</b><br />Latitude: " + p.coords.latitude + "<br />Longitude: " + p.coords.longitude
            //         });

            //         google.maps.event.addListener(marker, "click", function (e) {
            //             var infoWindow = new google.maps.InfoWindow();
            //             infoWindow.setContent(marker.title);
            //             infoWindow.open(map, marker);
            //         });

            //         google.maps.event.addListener(marker,'position_changed',function(){
            //             var lat = marker.getPosition().lat();
            //             var lng = marker.getPosition().lng();

            //             $('#lat').val( lat );
            //             $('#lng').val( lng );
            //         })
            //     });
            // } else {
            //     alert('Geo Location feature is not supported in this browser.');
            // }

            //var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            // set new center: 
            //gMap.setCenter(new google.maps.LatLng(37.4419, -122.1419));
            // var map = new google.maps.Map(document.getElementById("map"),{
            //     center:{
            //         lat: 27.22,
            //         lng: 85.36
            //     },
            //     zoom:15
            // });
                
                
            // var marker = new google.maps.Marker({
            //             draggable: true,
            //             icon: '/images/icons/s2b-pinpoint_logo.png',
            //             map: map,
            //             position: {
            //                 lat: 27.22,
            //                 lng: 85.36 
            //             }
            // });

            var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

            google.maps.event.addListener(searchBox,'places_changed',function(){
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;

                for(i=0; place=places[i];i++){
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }

                map.fitBounds(bounds);
                map.setZoom(15);

            });  

            google.maps.event.addListener(marker,'position_changed',function(){
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#lat').val( lat );
                $('#lng').val( lng );
            });
        }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjGoTuUHrw1uzD0n-fOEq7URdFA1ALbcE&callback=initMap&libraries=places">
        </script>
@endsection