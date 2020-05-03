<header class="main-header">
    <a href="#" class="logo"><img src="{{ asset('dist/img/logo.svg') }}" alt=""></a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('dist/img/avatar/'.AvatarUser()) }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Username() }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('dist/img/other/'. AvatarUser()) }}" class="img-circle" alt="User Image">
                            <p>
                                {{ Username() }} - {{ RoleUser() }}
                                <small><a style="color: white" href="{{ route('profile') }}">Profil</a></small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('lockscreen.index') }}" class="btn btn-default btn-flat">Verrouiller ma session</a>
                            </div>
                            <div class="pull-right">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat">Deconnexion</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>