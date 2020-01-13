<!-- Top navbar -->
<link type="text/css" href="{{ asset('css/app.css') }}">
<div id="app">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
            <!-- Notify center -->

            <Notifications></Notifications> 

            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <!-- <img alt="Image placeholder" src=""> -->
                            </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                            </div>
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
        </div>
    </nav>
</div>
<script src="{{ asset('js/app.js') }}"></script>

<!-- <script>
    setInterval(() => {
        $.ajax({
            type: "GET",
            url: "/notifications",
        }).done(function(res) {
            var data = res;
            for (var chave in data) {
                var result = data[chave];
                let count=0;
                // console.log(result[1]['data'][0]['id'])
              for (let index = 0; index < result.length; index++) {
                  const element = result[index]['data'][0];
                  count++
              }
              console.log(count)
            }
        });
    }, 3000);
</script> -->