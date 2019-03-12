<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top" style="background: black;">
    <div class="brand" style="background-color:transparent;">
        <a href="javascript::void(0);">
            <img alt="Linqq Logo" width="40%" class="img-responsive logo" src="{{url('/')}}/public/assets/images/poker-logo.png"/>
        </a>
    </div>
    <div class="container-fluid">
        <form class="navbar-form navbar-left">   
        </form>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img alt="Avatar" class="img-circle" src="{{url('/')}}/public/view_profile/{{Auth::user()->image}}">
                            <span style="color:white;">
                                {{Auth::user()->name}}
                            </span>
                            <i class="icon-submenu lnr lnr-chevron-down">
                            </i>
                        </img>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('admin/profile') }}">
                                <i class="lnr lnr-user">
                                </i>
                                <span>
                                    My Profile
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/logout') }}">
                                <i class="lnr lnr-exit">
                                </i>
                                <span>
                                    Logout
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAVBAR -->
