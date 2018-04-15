<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-social.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectric.css') }}" rel="stylesheet">
    <!-- Scripts -->

    <!-- JQUERY PARA AUTO FIELDS FILL  -->
    <script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap Date-Picker Plugin -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap-datepicker/bootstrap-datepicker.css') }}" rel="stylesheet">
    <script src="{{ asset('js/language.js') }}"></script>
    <script src="{{ asset('js/scrolling-nav.js') }}"></script>  
    <script src="{{ asset('js/jquery.selectric.min.js') }}"></script>  
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        autoclose: true,
        format: "dd/mm/yyyy",
        maxViewMode: 2,
        todayBtn: "linked",
        todayHighlight: true,
        startDate: '0'
      };
      date_input.datepicker(options);
    })
</script>
    
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        @include('main.header2')

        @yield('content')

        @include('main.footer')

        
    </div>
    
    <!-- Scripts -->

    
    <script type="text/javascript">
        $(document).ready(function () {
            if (window.location.href.indexOf('#_=_') > 0) {
            window.location = window.location.href.replace(/#.*/, '');
        }});
    </script>
<script>
function openModal() {
  document.getElementById('galleryModal').style.display = "block";
}

function closeModal() {
  document.getElementById('galleryModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/en-gb.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.js"></script>

<script type="text/javascript">
    var hour_type_id = 0;

    $(document).on('click', '#reservation_make', function() {
            var space = $(this).data('space');
            var dataInicio = $(this).data('dataInicio');
            var dataFim = $(this).data('dataFim');
            var hourType = $(this).data('hourType');
            var checkWeekend = $(this).data('weekend');
            var checkWeekend_msg = "";
            var resPrice = $(this).data('price');

            if (checkWeekend == true) {
                checkWeekend_msg = "Fins-de-semana incluídos";
                
            } else {
                checkWeekend_msg = "Fins-de-semana não incluídos";
            }

            // Atribuir novos valores à modal!
            $(".modal-body #modal-body-space").val( space );
            $(".modal-body #modal-body-dateBegin").val( dataInicio );
            $(".modal-body #modal-body-dateEnd").val( dataFim );
            $(".modal-body #modal-body-weekend").val( checkWeekend );
            $(".modal-body #modal-body-details").val( checkWeekend_msg );
            $(".modal-body #modal-body-hourtype").val( hourType );
            $(".modal-body #modal-body-price").val( resPrice );
            
            $('#makeReservation').modal('show');
        });

    $('#datebegin').change(function() {
        $('#reservation_make').data('dataInicio', this.value);
        if ( hour_type_id > 0 ) {
            calculatePrice();    
        }
        //
    //}).change();
    });

    $('#dateend').change(function() {
        $('#reservation_make').data('dataFim', this.value);
        if ( hour_type_id > 0 ) {
            calculatePrice();    
        }
    });

    $('#sp_hour_type').change(function() {
        var e = document.getElementById("sp_hour_type");
        hour_type_id = e.options[e.selectedIndex].value;

        $('#reservation_make').data('hourType', hour_type_id );
        calculatePrice();
    });

    $('#is_checked').change(function() {
        var x = document.getElementById('is_checked').checked;
        $('#reservation_make').data('weekend', x);
        calculatePrice();
    });

    function calculatePrice() {
        var dataInicio = $('#reservation_make').data('dataInicio');
        var dataFim = $('#reservation_make').data('dataFim');
        var hourType = $('#reservation_make').data('hourType');
        var checkWeekend = $('#reservation_make').data('weekend');
        var checkWeekend_msg = "";

        var price_type = document.getElementById("price_type").value; //Todos os dias ou difere semana e fds

        // Get week and weekend days
        var a = moment(dataInicio, "DD-MM-YYYY");
        var b = moment(dataFim, "DD-MM-YYYY");
        var num_days = b.diff(a, 'days')+1;
        var weekends = 0;
        var weekdays = 0;
        var date = a;

        for (i=1; i <= num_days; i++) {
            if (date.isoWeekday() == 6 || date.isoWeekday() == 7) {
              weekends += 1;
            }

            date = date.add(1, 'days');
        }

        weekdays = num_days - weekends;


        var price = 0;
        var price_wknd = 0;
        var total_price = 0;
        // Calculate reservation price
        if ( price_type == 1 ) { // se o preço é igual todos os dias
            
            var price_id = "t1_" + hourType;
            price = document.getElementById(price_id).value;

            if (checkWeekend == true) {
                checkWeekend_msg = "Fins-de-semana incluídos";

                total_price = price*num_days;

            } else {
                checkWeekend_msg = "Fins-de-semana não incluídos";
                total_price = price*weekdays;
            }
                
        } else { // quando o preço é diferente ao fim de semana

            var price_id2 = "t2_" + hourType;
            var price_id3 = "t3_" + hourType;
            var total_price_week = 0;
            var total_price_wknd = 0;

            price = document.getElementById(price_id2).value;
            price_wknd = document.getElementById(price_id3).value;

            if (checkWeekend == true) {
                checkWeekend_msg = "Fins-de-semana incluídos";

                total_price_week = price*weekdays;
                total_price_wknd = price_wknd*weekends;

                total_price = total_price_week + total_price_wknd;
                
            } else {
                checkWeekend_msg = "Fins-de-semana não incluídos";

                total_price = price*weekdays;
            }
        }

        $('#reservation_make').data('price', total_price+"€");
        $("#reservation_price").val( total_price+"€" );
    }

</script>

</body>
</html>
