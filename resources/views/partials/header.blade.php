<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow main-card">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"></li>
                <li class="nav-item"><a class="navbar-brand" href="/"><img style="height: 36px" class="brand-logo" alt="logo" src="{{asset('storage/logos/logo.jpg')}}">
                        <h3 class="brand-text text-capitalize">{{ config('app.name', 'Laravel') }}</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                </ul>
                <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item"><a id="notification" class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i><span class="badge badge-pill badge-danger badge-up badge-glow">0</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge badge-danger float-right m-0">0 Nouveau</span>
                                </li>
                                <li class="scrollable-container media-list w-100 ps"><a href="#">
                                    <div class="media">
                                        <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>
                                        <div class="media-body">
                                            
                                        </div>
                                    </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <li class="dropdown dropdown-user nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                        <span class="user-name text-bold-600">{{Auth::user()->name}}</span>
                            <i style="font-size: 1.5em;" class="la la-user">
                            </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/profil"><i class="la la-user"></i> Mon Profil</a>
                            @can('Gestion des utilisateurs')
                                <a class="dropdown-item" href="/utilisateurs"><i class="la la-group"></i>Utilisateurs</a>
                            @endcan
                            <hr>
                            <a class="dropdown-item" href="{{ route('logout') }} "
                            onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> Se déconnecter</a>
                            {{ Form::open(['id'=>'logout-form','action' => 'Auth\LoginController@logout','methode' => 'POST', 'style' => 'display: none;']) }}
                            {{ Form::close() }}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

