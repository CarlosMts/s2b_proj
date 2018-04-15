<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    @include('main.header2')
</head>

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

    <div ng-controller="LandingPageController">

        <!--===================== HOW WE WORK =====================-->

        <div id="how-we-work" style=" display: none; position: relative;">

            <div class="row" style="padding-top: 25px">

                <div class="col-xs-6 alignLeft"> <img class="img_logo ext-link" src="/images/logos/S2B_logo_grey_large.png" height="30" alt=""> </div>

                <div class="col-xs-6 alignRight">
                    <button class="close" style="margin-right: 20px;font-size: 30px; color: #c9c9c9;padding: 0px 10px 10px 10px;" ng-click="hidePanel()">&times;</button>
                </div>

            </div>

            <div class="row margintop100">

                <div class="col-md-10 col-md-offset-1">

                    <div class="col-md-3 col-sm-6 centered" id="step1">
                        <img src="/images/icons/s2b_lupa.png" alt="">
                        <p class="webbapp_howework_label">PESQUISE</p>
                    </div>

                    <div class="col-md-3 col-sm-6 centered" id="step2">
                        <img src="/images/icons/s2b_list_results.png" alt="">
                        <p class="webbapp_howework_label">ESCOLHA NOS RESULTADOS</p>
                    </div>

                    <div class="col-md-3 col-sm-6 centered" id="step3">
                        <img src="/images/icons/s2b_calendario.png" alt="">
                        <p class="webbapp_howework_label">RESERVE EM DOIS PASSOS</p>
                    </div>

                    <div class="col-md-3 col-sm-6 centered" id="step4">
                        <img src="/images/icons/s2b_confirmacao.png" alt="">
                        <p class="webbapp_howework_label">TENHA A CONFIRMAÇÃO</p>
                    </div>

                </div>

            </div>

            <div class="row margintop100 centered">

                <p class="webbapp_howework_info">Se tiver dúvidas veja as <a ng-click="help()">Perguntas                    Frequentes</a> ou entre em <a ng-click="contacts()">contacto</a> connosco</p>

            </div>

        </div>

        <!--===================== MAIN ZONE =====================-->

        <section id="code01" class="main-zone-lg">

            <div class="main-zone-content">

                <div class="main-zone-search ">

                    <div class="webbapp-intro-welcome">

                        <div ng-show="sessionManager.info"> 

                            @if (Auth::check())
                                {{ trans('homepage.session_user_name') . Auth::user()->name }}
                            @endif

                        </div>

                    </div>

                    <form id="contactForm1" method="GET" action="/search" accept-charset="UTF-8" class="form-wrapper cf" role="search">
                    
                        <div class="row">

                            <div class="col-sm-4" style="padding-right:0px">
                                <input class="input-space-city" name="search_city" type="text" id="sp_city" ng-model="searchData.name" placeholder="{{ trans('homepage.search_city') }}"> </div>

                            <div class="col-sm-3" style="padding-left:0px; padding-right:0px">

                                <div class="input-spacetype-group-btn">
                                    <!-- <button type="button" id="input-spacetype-dropdown-toogle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ trans('homepage.search_spacetype') }}</button>
                                    <ul class="dropdown-menu" role="menu">

                                        <li>
                                            <a>All</a>
                                        @foreach ($spacetypes as $key => $sp)
                                            <a>{{ $sp->short_name }}</a>
                                        @endforeach
                                        </li>
                                    </ul>  -->

                                    <select name="type_select" id="sp_type">
                                        <option class="type_gray" value="" disabled selected>{{ trans('homepage.search_spacetype') }}</option>
                                        <option value="all">All</option>
                                        @foreach ($spacetypes as $key => $sp)
                                            <option value="{{ $sp->id }}">{{ $sp->short_name }}</option>
                                        @endforeach
                                    </select>

                                
                                </div>

                            </div>

                            <div class="col-sm-3" style="padding-left:0px; padding-right:0px">

                                <input type="text" class="input-data" placeholder="{{ trans('homepage.search_date') }}">

                            </div>

                            <div class="col-sm-2" style="padding-left:0px">
                                <button type="submit" ng-click="search()">{{ trans('homepage.search_bt_find') }}</button>
                            </div>

                        </div>

                    </form>

                </div>

                <div class="row"> <a class="webbapp_howwework" ng-click="showPanel()">{{ trans('homepage.howwework') }}</a> </div>

            </div>

        </section>

        <!--===================== SPACE TYPES =====================-->

        <section id="code05" class="space-types">

            <div class="container">

                <div class="row">

                    <div class="col-md-4 col-sm-6 col-xs-12 webapp-center-item">
                        <img src="/images/space_types/auditorium_100x100.png" alt="">
                        <h1>{{ trans('homepage.auditoriums') }}</h1>

                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 webapp-center-item">
                        <img src="/images/space_types/coworking_100x100.png" alt="">
                        <h1>{{ trans('homepage.coworking') }}</h1>

                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 webapp-center-item">
                        <img src="/images/space_types/offices_100x100.png" alt="">
                        <h1>{{ trans('homepage.offices') }}</h1>

                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 webapp-center-item">
                        <img src="/images/space_types/formacao_100x100.png" alt="">
                        <h1>{{ trans('homepage.training_room') }}</h1>

                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 webapp-center-item">
                        <img src="/images/space_types/meeting_large_100x100.png" alt="">
                        <h1> {{ trans('homepage.large_meeting_room') }}</h1>

                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 webapp-center-item">
                        <img src="/images/space_types/meeting_small_100x100.png" alt="">
                        <h1>{{ trans('homepage.small_meeting_room') }}</h1>

                    </div>

                </div>

            </div>

        </section>

        <!--===================== HOW SPACE2BUSINESS WORKS=====================-->

        <section class="how-s2b-works">

            <div class="container">

                <div class="row">
                    <h1>How space2business Works</h1>

                    <h2>We provide you an easy-to-find and easy-to-book workplaces</h2>
                </div>

                <div class="row">

                    <div class="centered-content">
                        <div class="col-xs-6 col-sm-4">
                            <img class="img-responsive" src="/images/landing_page/workspace_img_1.png" alt=""> 
                            <p>Find it First</p>
                        </div>

                        <div class="col-xs-6 col-sm-4">
                            <img class="img-responsive" src="/images/landing_page/booking_img_1.png" alt="">
                            <p>Book it Instantly</p>
                        </div>

                        <div class="col-xs-6 col-sm-4">
                            <img class="img-responsive" src="/images/landing_page/share_experience_img_1.png" alt="">
                            <p>Share your Experience</p>
                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!--===================== WHY SPACE2BUSINESS =====================-->

        <section class="why-s2b">

            <div class="container">

                <div class="row">

                    <div class="col-xs-5 centered"> 
                        <img class="img-responsive" src="/images/icons/advantages.png" alt=""> 
                    </div>

                    <div class="col-xs-7">

                        <h1 class="">Serviço Gratuito</h1>

                        <p class=""> Rentabilidade do seu espaço de trabalho
                            <br> Eficiência no processo de reserva
                            <br> Publicidade do seu espaço de trabalho
                            <br> Acesso a estatísticas
                            <br> Asseguramos uma taxa elevada de reservas </p>

                    </div>

                </div>

                <div class="row margintop100">

                    <div class="col-sm-4">

                        <div class="col-xs-3 alignRight"><span class="fa fa-file"></span>
                        </div>

                        <div class="col-xs-9">

                            <h2>Registe o seu espaço</h2>

                            <p> O primeiro passo é registar o seu espaço de trabalho, preenchendo os campos obrigatórios. </p>

                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="col-xs-3 alignRight"><span class="fa fa-exclamation"></span>
                        </div>

                        <div class="col-xs-9">

                            <h2>Aguarde Validação</h2>

                            <p> A nossa equipa irá validar o seu espaço de trabalho, verificando todas as informações fornecidas. Será contactado via email, no espaço de 24h após o registo. </p>

                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="col-xs-3 alignRight"><span class="fa fa-camera"></span>
                        </div>

                        <div class="col-xs-9">

                            <h2>S2B Fotógrafos</h2>

                            <p> Deslumbre-se com imagens do seu espaço. </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!--===================== MOST WANTED WORKSPACES =====================-->


            <section class="wanted-workspaces">

                <div class="container-folio">

                    <div class="container">

                        <div class="row">

                            <h1>Espaços de trabalho mais procurados </h1>

                            <div class="owl-carousel owl-theme" id="folio">

                                <div class="item" ng-repeat="slide in sliders">

                                    <div class="folio-content">
                                        <a ng-click="goToSpaceDetail(slide.id)"> <img class="img-responsive" /> </a>
                                    </div>

                                </div>

                            </div>

                            <div class="folio-btn"> <a>Ver Mais</a> </div>

                        </div>

                    </div>

                </div>

            </section>


        <!--===================== SIGN NEWSLETTER =====================-->

        <div perfect-parallax parallax-ratio="0.0" parallax-css="transform:translateY">

            <section class="newsletter" perfect-parallax parallax-ratio="0.3" parallax-css="background-position-y" parallax-init-val="0">

                <div class="newsletter-bg">

                    <div class="container">

                        <div class="row">

                            <div class="input-group">

                                <form class="form-wrapper-nl cf form-landing" name="newsletterForm" ng-submit="submitEmail(newsletterForm,newsletterForm.$valid)" novalidate>

                                    <div class="row">

                                        <div class="col-xs-12">
                                            <h1>Join the space2business community</h1>

                                            <h2>Enter your email now for the best news about workspaces and discount offers</h2>
                                        </div>

                                        <div class="col-xs-12" style="min-height: 50px; padding-top:60px;">

                                            <div ng-show="data.status != 200">

                                                <div class="input-group">
                                                    <input class="input-email" type="email" placeholder="Insert your email" ng-model="data.email" name="email">
                                                    <button type="submit">Submeter</button>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </div>

        <!-- Return to Top -->
        <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>

        @include('main.footer')

    </div>

    

    <!-- Scripts -->
    <script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
    <!-- <script src="{{ asset('/js/bootstrap-datepicker/moment.js') }}"></script> -->
    <script src="{{ asset('/js/bootstrap-datepicker/transition.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-datepicker/collapse.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script>
        // Initialisation des DateTimePicker
        $('.input-data').datepicker({
            format: "dd/mm/yyyy",
            maxViewMode: 2,
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            startDate: '0'
        });
    </script>

    <script src="{{ asset('js/language.js') }}"></script>
    <script src="{{ asset('js/scrolling-nav.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script type="text/javascript">
        var frm = $('#contactForm1');

        frm.submit(function (e) {

            e.preventDefault();
            var name = $('#sp_city').val(); 
            var type = $('#sp_type').val(); 

            var url = '{{ route("search", [":name", ":type"] ) }}';
            url = url.replace(':name', name);
            url = url.replace(':type', type);

            window.location.assign(url);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            if (window.location.href.indexOf('#_=_') > 0) {
            window.location = window.location.href.replace(/#.*/, '');
        }});
    </script>
</body>

</html>