<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}" target="_blank">Al's Beef Arabia</a>
    </div>
    <ul class="nav navbar-right top-nav">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            	<i class="fa fa-user"></i> {{ $currentUser->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="/auth/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{ route('admin') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}">
                    <i class="fa fa-list"></i> Categories
                </a>
            </li>
            <li>
                <a href="{{ route('admin.menus.index') }}">
                    <i class="fa fa-image"></i> Menus
                </a>
            </li>	

            <li>
                <a href="{{ route('admin.stores.index') }}">
                    <i class="fa fa-fw fa-bar-chart-o"></i> Stores
                </a>
            </li>  

            <li>
                <a href="{{ route('admin.slides.index') }}">
                    <i class="fa fa-sliders"></i> Slides
                </a>
            </li>  


            
        </ul>
    </div>
</nav>