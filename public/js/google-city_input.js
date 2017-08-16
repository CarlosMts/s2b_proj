// FUNCOES PARA AUTO FILL DA CIDADE E PAIS

window.initMap = function(){
    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        var company_input = document.getElementById('google-company');
        var company_autocomplete = new google.maps.places.Autocomplete(company_input);
        
        company_autocomplete.addListener('place_changed', function () {
            var company_place = company_autocomplete.getPlace();

            if ( company_place.address_components.length >= 2 ) {
                var get_city = document.getElementById("google-company").value;
                var space_input_split = get_city.split(',');
                
                $('#company_city').val(space_input_split[0].trim());

                $('#company_country').val(space_input_split[1].trim());
            } else {
                $('#city_alert').show();
            }
        });
    }

    // google.maps.event.addDomListener(window, 'load', initialize);

    // function initialize() {

    //     var space_input = document.getElementById('google-space');
    //     var space_autocomplete = new google.maps.places.Autocomplete(space_input);
    //     space_autocomplete.addListener('place_changed', function () {
    //         var space_place = space_autocomplete.getPlace();
    //         // place variable will have all the information you are looking for.

    //         var get_city = document.getElementById("google-space").value;
    //         var space_input_split = get_city.split(',');
    //         //console.log(space_input_split[0].trim());
    //         //console.log(space_input_split[1].trim());
            
    //         $('#space_city').val(space_input_split[0].trim());

    //         $('#space_country').val(space_input_split[1].trim());
    //     });
    // }


}