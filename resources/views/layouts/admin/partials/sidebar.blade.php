<header class="main-nav">
    <div class="sidebar-user text-center">
    </div>
    <nav class="head-main-navbar">
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li>
                        <a href="{{ route('admin.home') }}"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    @can('user_management_access')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ request()->is('admin/permissions*', 'admin/roles*', 'admin/users*') ? 'active' : '' }}"
                                href="javascript:void(0)"><i data-feather="users"></i><span>User Management</span></a>
                            <ul class="nav-submenu menu-content"
                                style="display: {{ request()->is('admin/permissions*', 'admin/roles*', 'admin/users*') ? 'block' : '' }}">
                                @can('permission_access')
                                    <li><a href="{{ route('admin.permissions.index') }}">Permession</a></li>
                                @endcan
                                @can('role_access')
                                    <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                                @endcan
                                @can('user_access')
                                    <li><a href="{{ route('admin.users.index') }}">User</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('account_management_access')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ request()->is('admin/accounts*') ? 'active' : '' }}"
                                href="javascript:void(0)"><i data-feather="home"></i><span>Account Management</span></a>
                            <ul class="nav-submenu menu-content"
                                style="display: {{ request()->is('admin/account*', 'admin/member*') ? 'block' : '' }}">
                                @can('account_access')
                                    <li><a href="{{ route('admin.accounts.index') }}">Accounts</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    <li class="dropdown">
                        <a class="nav-link {{ request()->is('admin/profile*') ? 'active' : '' }}" href="{{ route('admin.profile.index') }}"><i data-feather="user"></i>Profile</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-item nav-link has-icon text-danger"
                            onclick="event.preventDefault(); document.getElementById('logoutform').submit();"><i
                                data-feather="log-out"></i>Log out</a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
