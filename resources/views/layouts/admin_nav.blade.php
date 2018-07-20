@if(Session::has('user'))

<!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route('adminDashboard')}}">Admin</a>
                <a class="navbar-brand hidden" href="{{route('adminDashboard')}}">Admin</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ (Request::route()->getName() == 'adminDashboard') ? 'active' : '' }}">
                        <a href={{route('adminDashboard')}}> <i class="menu-icon fa fa-dashboard"></i> {{ trans('page.dashboard') }}</a>
                    </li>
                    <!-- <h3 class="menu-title"> Sections</h3> --><!-- /.menu-title -->
                    <li class="{{ (Request::route()->getName() == 'jobs') ? 'active' : '' }}">
                        <a href="{{route('jobs')}}"> <i class="menu-icon ti-slice"></i> {{ trans('page.jobs') }}</a>
                    </li> 
                    <li class="{{ (Request::route()->getName() == 'pages') ? 'active' : '' }}">
                        <a href="{{route('pages')}}"> <i class="menu-icon ti-email"></i> {{ trans('page.pages') }} </a>
                    </li>
                    <li class="{{ (Request::route()->getName() == 'setting') ? 'active' : '' }}">
                        <a href="{{route('setting')}}"> <i class="menu-icon ti-settings"></i>{{ trans('page.settings') }} </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->
    
@endif