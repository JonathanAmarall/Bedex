<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            Logo
            <!-- <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
        </a>

        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <!-- <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg"> -->
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Bem-vindo!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Meu perfil') }}</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            Logout
                            <!-- <img src="http://www.prefeiturademacaubas.ba.gov.br/midia/2017/05/img-user.png"> -->
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="color: #f4645f;" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#navbar1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar1">
                        <i class="fas fa-money-check-alt" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Propostas') }}</span>
                    </a>
                    <div class="collapse" id="navbar1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('formulario.create') }}">
                                    <i class="fas fa-plus"></i>
                                    {{ __('Nova proposta') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('formulario.index') }}">
                                    <i class="fas fa-list"></i>
                                    {{ __('Minhas propostas') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @role('admin')
                <li class="nav-item">
                    <a class="nav-link" href="#navbar2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar2">
                        <i class="fas fa-users" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Usuários') }}</span>
                    </a>

                    <div class="collapse" id="navbar2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('Controle de Usuários') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endrole

                <li class="nav-item">
                    <a class="nav-link active" href="#navbar3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar3">
                        <i class="fas fa-wallet" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Simulador') }}</span>
                    </a>

                    <div class="collapse" id="navbar3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('simulador') }}">
                                    <i class="fas fa-wallet"></i>
                                    {{ __('Simulador') }}
                                </a>
                            </li>
                            @role('admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('simuladorConfig') }}">
                                    <i class="fas fa-cogs"></i>
                                    {{ __('Configurações') }}
                                </a>
                            </li>
                            @endrole
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
        </div>
    </div>
</nav>