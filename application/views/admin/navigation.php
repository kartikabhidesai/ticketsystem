<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        @php $profilePic = Auth::guard('company')->user()->profile_pic; @endphp
                        @if($profilePic != "")
                            @if(file_exists(public_path() . '/uploads/company/'.$profilePic))
                            <img class="img-rounded"  src="{{ url('/uploads/company/'.$profilePic) }}" width='50' height="50">
                            @endif
                        @else
                            <img class="img-rounded" src="{{ url('/uploads/dummyImage/dummy-profile.jpg') }}" width='50' height="50">
                        @endif
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear" style='width: 50%'>
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::guard('company')->user()->first_name }} {{ Auth::guard('company')->user()->last_name }}</strong>
                            </span> <span class="text-muted text-xs block">{{ Auth::guard('company')->user()->role_type }} <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route ('logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="{{ isActiveRoute('company-dashboard') }}">
                <a href="{{ route ('company-dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            
        </ul>

    </div>
</nav>
