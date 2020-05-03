<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/avatar/'.AvatarUser()) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Username() }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Rechercher...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ $dashboard ?? '' }}"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Tableau de bord</span></a></li>
            <li class="{{ $region ?? '' }}"><a href="{{ route('region.index') }}"><i class="fa fa-globe"></i> <span> Regions</span></a></li>
            <li class="{{ $city ?? '' }}"><a href="{{ route('city.index') }}"><i class="fa fa-location-arrow"></i> <span> Villes</span></a></li>
            <li class="{{ $statistic ?? '' }}"><a href="{{ route('statistic.index') }}"><i class="fa fa-bar-chart"></i> <span> Statistiques</span></a></li>
            <li class="{{ $user ?? '' }}"><a href="{{ route('user.index') }}"><i class="fa fa-users"></i> <span> Utilisateurs</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>