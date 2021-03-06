<nav id="sidebarMenu" class="fixed-side col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="sidebar-sticky fixed-side pt-3">

        <div class="nav-item fixed-top logo">
            <a href="{{url('/home')}}"><img src="img/Logo_transparente_sin_texto.png" alt="logotipo de traCE"
                    class="img-fluid"></a>
        </div>

        <div class="nav-item full-vertical-align">
            <div class="side-bar-menu">
                <ul class="nav flex-column">  
                    @if (auth()->user()->role_id != "Soci")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard') ? 'active-black' : 'primary-green'}}"
                            href="{{url('/dashboard')}}">
                            <span><i class="icofont-home"></i></span>
                            Inici <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('user') ? 'active-black' : 'primary-green'}}" href="{{url('/user')}}">
                            <span><i class="icofont-users-alt-3"></i></span>
                            Usuaris
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('activity') ? 'active-black' : 'primary-green'}}"
                            href="{{url('/activity')}}">
                            <span><i class="icofont-attachment"></i></span>
                            Activitats
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('areas') ? 'active-black' : 'primary-green'}}"
                            href="{{url('/areas')}}">
                            <span><i class="icofont-list"></i></span>
                            Àrees
                        </a>
                    </li>
                    @if (auth()->user()->role_id == "Admin")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('team') ? 'active-black' : 'primary-green'}}" href="{{url('/team')}}">
                            <span><i class="icofont-id"></i></span>
                            Gestió de l'Equip
                        </a>
                    </li>
                    @endif
                    @if (auth()->user()->role_id == "Admin")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('transparency') ? 'active-black' : 'primary-green'}}"
                            href="{{url('/transparency')}}">
                            <span><i class="icofont-page"></i></span>
                            Transparència
                        </a>
                    </li>
                    @endif
                    <li class="nav-item pt-3">
                        <div class="nav-item logoutbtn">
                            <a class="nav-link" href="{{ route('logout') }}" target="_blank" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                                <span>
                                    <i class="icofont-logout"></i></i>
                                </span>
                                Tancar sessió
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endif
                    @if (auth()->user()->role_id == "Soci")
                    <li class="nav-item soci-menu">
                        <a class="nav-link {{ request()->is('dashboard') ? 'active-soci' : 'primary-green'}}"
                            href="{{url('/dashboard')}}">
                            <span><i class="icofont-clock-time"></i></span>
                            Avui
                        </a>
                    </li>
                    <li class="nav-item soci-menu">
                        <a class="nav-link {{ request()->is('soci-all-activities') ? 'active-soci' : 'primary-green'}}"
                            href="{{url('/soci-all-activities')}}">
                            <span><i class="icofont-calendar"></i></span>
                            La setmana
                        </a>
                    </li>
                    <li class="nav-item soci-menu pt-3">
                        <div class="nav-item logoutbtn">
                            <a class="nav-link" href="{{ route('logout') }}" target="_blank" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                                <span>
                                    <i class="icofont-logout"></i></i>
                                </span>
                                Tancar sessió
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>