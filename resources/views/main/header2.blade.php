@if (Route::currentRouteName() == 'home')
    <nav class="navbar-landing navbar-transparent navbar-static-top">
@else 
    <nav class="navbar navbar-default navbar-static-top">
@endif
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    @if (Route::currentRouteName() == 'home')
                    <img src="/images/logos/S2B_logo_white_large.png" height="25" width="167" alt="space2business_logo">
                    @else 
                    <img src="/images/logos/S2B_logo_blue_large.png" height="25" width="167" alt="space2business_logo">
                    @endif
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('space.index') }}">Partilhar</a></li>
                        <li><a href="{{ route('faqs') }}">Ajuda</a></li>
                        <li><a href="{{ route('contacts') }}">Contacts</a></li>
                        <li><a href="{{ route('login') }}">Entrar</a></li>
                    @else
                        <li><a href="{{ route('space.index') }}">Partilhar</a></li>
                        <li><a href="#">Populares</a></li>
                        <li><a href="{{ route('faqs') }}">Ajuda</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                <img src="{{ Auth::user()->avatar }}" style="height:32px; width:32px; position:absolute; top:10px; left:10px; border-radius:50%;"> <span class="glyphicon glyphicon-menu-down"></span>
                            </a> 

                            <ul class="dropdown-menu" role="menu">
                                <li class="user-dropdown-info">
                                    <img src="{{ Auth::user()->avatar }}">
                                    <span class="username">{{ Auth::user()->name }}</span>
                                    <span class="email">{{ Auth::user()->email }}</span>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('profile') }}"> my profile </a>
                                </li>
                                <li>
                                    <a href="{{ route('chat') }}"> messages </a>
                                </li>
                                @if (Auth::user()->is_admin>=1)
                                <li>
                                    <a href="{{ route('admin') }}" >
                                        Administration
                                    </a>
                                </li>
                                @endif
                                <li class="divider"></li>
                                @if (Auth::user()->haveSpaces==1)
                                <li>
                                    <a href="{{ route('myspaces') }}" >
                                        my spaces
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('space-reservations') }}" >
                                        space reservations
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

