<div class="page-main-header">
    <div class="main-header-right row m-0">
        <div class="main-header-left">
            <div class="logo-wrapper"><img class="img-fluid" src="{{ asset('assets/images/logo/mongolia-3.png') }}" height="100px" alt=""></div>
            <div class="dark-logo-wrapper"><img class="img-fluid" src="{{ asset('assets/images/logo/mongolia-3.png') }}" height="100px"alt=""></div>
            <div class="toggle-sidebar" id="sidebar-toggle"><i class="status_toggle middle" data-feather="align-center">
                </i></div>
        </div>
        <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                            data-feather="maximize"></i></a></li>
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>
                <li>
                    <div class="dropdown-avtar p-0">
                        <img class="avatar-image rounded-circle"
                            src="{{ asset(isset(auth()->user()->image) ? auth()->user()->image : 'assets/images/dashboard/1.png') }}"
                            alt="" />
                    </div>

                    <div class="dropdown-menu avtar-menu dropdown-menu-right">
                        <div class="dropdown-item has-icon">{{ auth()->user()->name }}</div>
                        <a href="{{ route('admin.profile.index') }}" class="dropdown-item has-icon"> <i
                                data-feather="user"></i> Profile</a>
                        <a class="dropdown-item has-icon text-danger"
                            onclick="event.preventDefault(); document.getElementById('logoutform').submit();"><i
                                data-feather="log-out"></i>Log out</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
</div>
