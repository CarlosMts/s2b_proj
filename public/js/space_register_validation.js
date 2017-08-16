(function( $ ) {
        $(function() {
            $('.openHour').mask('00:00');
            $('.closeHour').mask('00:00');
            $('.cep').mask('0000-000');
            $('.phone').mask('000 000 000');
      });
    })(jQuery);

    

    $(document).ready(function() {
        $(function(){
            $('.openHour').focus( function() {
                $(this).val('');
            });

            $(".openHour").blur( function() {
                if ( $(this).val()=="") {
                    $(this).val('09:00');
                } 
            });

            $('.closeHour').focus( function() {
                $(this).val('');
            });

            $(".closeHour").blur( function() {
                if ( $(this).val()=="") {
                    $(this).val('18:00');
                } 
            });

            /*$(document).ready(function () {
                $("#clases").change(function () {
                    $("#descripcion").toggle();
                });
            });*/

        });
    });

    $(document).ready(function() {
        // SEGUNDA hide/show input hour 
        document.getElementById('is_all_day1').onchange = function() {
            document.getElementById('sched1').style.display = this.checked ? 'none' : 'block';
            $("#is_closed1").prop("checked", false);
            $("#open1").val('00:00');
            $("#close1").val('24:00');
        };
        document.getElementById('is_closed1').onchange = function() {
            document.getElementById('sched1').style.display = this.checked ? 'none' : 'block';
            $("#is_all_day1").prop("checked", false);
            $("#open1").val('09:00');
            $("#close1").val('18:00');
        };

        // TERCA hide/show input hour 
        document.getElementById('is_all_day2').onchange = function() {
            document.getElementById('sched2').style.display = this.checked ? 'none' : 'block';
            $("#is_closed2").prop("checked", false);
            $("#open2").val('00:00');
            $("#close2").val('24:00');
        };
        document.getElementById('is_closed2').onchange = function() {
            document.getElementById('sched2').style.display = this.checked ? 'none' : 'block';
            $("#is_all_day2").prop("checked", false);
            $("#open2").val('09:00');
            $("#close2").val('18:00');
        };

        // QUARTA hide/show input hour 
        document.getElementById('is_all_day3').onchange = function() {
            document.getElementById('sched3').style.display = this.checked ? 'none' : 'block';
            $("#is_closed3").prop("checked", false);
            $("#open3").val('00:00');
            $("#close3").val('24:00');
        };
        document.getElementById('is_closed3').onchange = function() {
            document.getElementById('sched3').style.display = this.checked ? 'none' : 'block';
            $("#is_all_day3").prop("checked", false);
            $("#open3").val('09:00');
            $("#close3").val('18:00');
        };

        // QUINTA hide/show input hour 
        document.getElementById('is_all_day4').onchange = function() {
            document.getElementById('sched4').style.display = this.checked ? 'none' : 'block';
            $("#is_closed4").prop("checked", false);
            $("#open4").val('00:00');
            $("#close4").val('24:00');
        };
        document.getElementById('is_closed4').onchange = function() {
            document.getElementById('sched4').style.display = this.checked ? 'none' : 'block';
            $("#is_all_day4").prop("checked", false);
            $("#open4").val('09:00');
            $("#close4").val('18:00');
        };

        // SEXTA hide/show input hour 
        document.getElementById('is_all_day5').onchange = function() {
            document.getElementById('sched5').style.display = this.checked ? 'none' : 'block';
            $("#is_closed5").prop("checked", false);
            $("#open5").val('00:00');
            $("#close5").val('24:00');
        };
        document.getElementById('is_closed5').onchange = function() {
            document.getElementById('sched5').style.display = this.checked ? 'none' : 'block';
            $("#is_all_day5").prop("checked", false);
            $("#open5").val('09:00');
            $("#close5").val('18:00');
        };

        // SABADO hide/show input hour 
        document.getElementById('is_all_day6').onchange = function() {
            document.getElementById('sched6').style.display = this.checked ? 'none' : 'block';
            $("#is_closed6").prop("checked", false);
            $("#open6").val('00:00');
            $("#close6").val('24:00');
        };
        document.getElementById('is_closed6').onchange = function() {
            document.getElementById('sched6').style.display = this.checked ? 'none' : 'block';
            $("#is_all_day6").prop("checked", false);
            $("#open6").val('09:00');
            $("#close6").val('18:00');
        };

        // DOMINGO hide/show input hour 
        document.getElementById('is_all_day7').onchange = function() {
            document.getElementById('sched7').style.display = this.checked ? 'none' : 'block';
            $("#is_closed7").prop("checked", false);
            $("#open7").val('00:00');
            $("#close7").val('24:00');
        };
        document.getElementById('is_closed7').onchange = function() {
            document.getElementById('sched7').style.display = this.checked ? 'none' : 'block';
            $("#is_all_day7").prop("checked", false);
            $("#open7").val('09:00');
            $("#close7").val('18:00');
        };
    });

    $(document).ready(function() {
        $("#myTab").click(function() {
            $("#formAlert").hide();
        });
    });

    $(document).ready(function() {
        $(function(){
            $('#btn-submit').click(function() {

                var tab = $('.nav-tabs .active > a').attr('href'); 
                
                if (tab=="#alldays") {
                    $("#hour_price2").val(null);
                    $("#hour4_price2").val(null);
                    $("#hour8_price2").val(null);
                    $("#month_price2").val(null);

                    $("#hour_price3").val(null);
                    $("#hour4_price3").val(null);
                    $("#hour8_price3").val(null);
                    $("#month_price3").val(null);
                } else if (tab=="#alternateprices") {
                    $("#formAlert").hide();

                    if ( ($("#hour_price2").val()=="" && $("#hour_price3").val()!="") || ($("#hour_price2").val()!="" && $("#hour_price3").val()=="") ) {
                        
                        $("#formAlert").slideDown(400); 

                    } else if ( ($("#hour4_price2").val()=="" && $("#hour4_price3").val()!="") || ($("#hour4_price2").val()!="" && $("#hour4_price3").val()=="") ) {
                        
                        $("#formAlert").slideDown(400); 

                    } else if ( ($("#hour8_price2").val()=="" && $("#hour8_price3").val()!="") || ($("#hour8_price2").val()!="" && $("#hour8_price3").val()=="") ) {
                        
                        $("#formAlert").slideDown(400); 

                    } else if ( ($("#month_price2").val()=="" && $("#month_price3").val()!="") || ($("#month_price2").val()!="" && $("#month_price3").val()=="") ) {
                        
                        $("#formAlert").slideDown(400); 
                    }
                        
                    $("#hour_price1").val(null);
                    $("#hour4_price1").val(null);
                    $("#hour8_price1").val(null);
                    $("#month_price1").val(null);
                }

                $(".alert").find(".close").on("click", function (e) {
                    e.stopPropagation(); 
                    e.preventDefault();   
                    $(this).closest(".alert").slideUp(400);  
                });
       
            });
        });
    });
