<div class="webapp-header-menu-container" ng-class="{\'fixed\': layoutService.checkFix()}" ng-controller="HeaderController" ng-click="hackClick($event)">

    <div class="row">

        <div class="col-sm-12" document-click-directive="handleClick($event)"> </div>

    </div>

    <nav class="navbar navbar-default" ng-show="sessionManager.token == null">

        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a ng-click="home()"> <img class="menu-logo" ng-src="{{layoutService.check() ? \'/images/S2B_logo_large.png\' : \'/images/S2B_logo_large_white.png\'}}" height="30" alt=""> </a>
            </div>

            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">

                <ul class="nav navbar-nav navbar-right">

                    <li><a class="nav-link" ng-class="{\'dark\': layoutService.check()}" ng-click="partilha()">PARTILHA</a> </li>

                    <li><a class="nav-link" ng-class="{\'dark\': layoutService.check()}" ng-click="help()">AJUDA</a>
                    </li>

                    <li><a class="nav-link" ng-class="{\'dark\': layoutService.check()}" ng-click="contacts()">CONTACTOS</a> </li>

                    <li><a class="nav-link btn-login" ng-class="{\'dark\': layoutService.check()}" ng-click="login()">ENTRAR</a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <div ng-show="sessionManager.token != null">
        <a class="pages-logo" ng-click="home()"> <img ng-src="{{layoutService.check() ? \'/images/S2B_logo_large.png\' : \'/images/S2B_logo_large_white.png\'}}" height="30" alt=""> </a>
        <div class="navigation-menu webapp-header fixItem"> <a class="link" ng-class="{\'dark\': layoutService.check()}" ng-click="toogleMenu()"><i                    class="fa fa-align-right"></i>            </a> </div>

    </div>

    <div ng-if="sessionManager.token != null">

        <div class="webapp-menu" ng-show="layoutService.menuOpened">

            <div class="logo">
                <img src="/images/S2B_logo.png" ng-hide="sessionManager.info.image_tag" />
                <div class="webbapp_photo_frame header" ng-if="sessionManager.info.image_tag"> <img ng-if="sessionManager.info.image_tag" class="webbapp_photo header" style="background-image: url(\'/api/files/get/{{sessionManager.info.image_tag}}?type=image\');"> </div>

                <div class="webapp-header-name">{{sessionManager.info.firstname + " " + sessionManager.info.lastname}} </div>

                <div class="webapp-header-email">{{"(" + sessionManager.info.email + ")"}}</div>

            </div>

            <div class="menu">

                <ul>

                    <li ng-click="administration()" ng-show="sessionManager.info.isAdmin"><span>ADMINISTRAÇÃO</span> </li>
                    <ul class="noright" ng-show="sessionManager.info && sessionManager.info.isAdmin" toggle callback="menuState.adminMenu" init="false">
                        <li ng-click="approveSpaces()"><span>APROVAR ESPAÇOS</span>
                        </li>

                        <li ng-click="approveComments()"><span>APROVAR COMENTÁRIOS</span>
                        </li>

                        <li ng-click="approveReservations()"><span>APROVAR RESERVAS</span>
                        </li>

                        <li ng-click="manageChecklists()"><span>GESTÃO DE WORKSPACES</span>
                        </li>

                        <li ng-click="manageSpaces()"><span>GESTÃO DE ESPAÇOS</span>
                        </li>

                        <li ng-click="manageReservations()"><span>GESTÃO DE RESERVAS</span>
                        </li>

                        <li ng-click="manageDiscounts()"><span>GESTÃO DE DESCONTOS</span>
                        </li>

                        <li ng-click="manageConfigurations()"><span>CONFIGURAÇÕES</span>
                        </li>

                    </ul>

                    <li ng-click="personalArea()"><span>ÁREA PESSOAL     </span>
                    </li>

                    <ul class="noright" toggle callback="menuState.userMenu" init="false">

                        <li ng-click="myData()"><span>OS MEUS DADOS</span>
                        </li>

                        <li ng-show="spacesLenght > 0" ng-click="mySpaces()"><span>OS MEUS ESPAÇOS</span>
                        </li>

                        <li ng-show="reservationsLenght > 0" ng-click="myReservations()"><span>AS MINHAS RESERVAS</span> </li>

                        <li ng-show="favouritesLength > 0" ng-click="myFavourites()"><span>FAVORITOS</span>
                        </li>

                    </ul>

                    <li ng-click="find()"><span>ENCONTRAR</span>
                    </li>

                    <li ng-click="share()"><span>PARTILHAR</span>
                    </li>

                    <li ng-click="popularWorkspaces()"><span>ESPAÇOS POPULARES</span>
                    </li>

                    <LI ng-click="logout()"><span>SAIR</span>
                    </LI>
                </ul>
            </div>

        </div>

    </div>

</div>
<!-- String ImageLogoPath = (!IsHomeView) ? Url.Content("~/Content/Images/S2B_logo_large.png") : Url.Content("~/Content/Images/logo_s2b_white.png");-->
<!-- !HomeView<div class="navigation-menu">    <a href="/home/share">SHARE</a>    <a href="/home/help">HELP</a>    <a href="/home/contacts">CONTACTS</a>    <a style="color: #3498db;" onclick="OpenModal(\'#loginModal\');">SIGN IN</a></div>    HomeView    <div class="navigation-menu">                <a href="/home/share" style="color: #e0e0e0;">SHARE</a>                <a href="/home/help" style="color: #e0e0e0;">HELP</a>                <a href="/home/contacts" style="color: #e0e0e0;">CONTACTS</a>                <a style="color: #3498db;" onclick="OpenModal(\'#loginModal\');">SIGN IN</a>            </div>-->