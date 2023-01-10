<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img
            class="img-90 rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        <a href="user-profile">
            <h6 class="mt-3 f-14 f-w-600">Emay Walter</h6>
        </a>
        <p class="mb-0 font-roboto">Human Resources Department</p>
        <ul>
            <li>
                <span><span class="counter">19.8</span>k</span>
                <p>Follow</p>
            </li>
            <li>
                <span>2 year</span>
                <p>Experince</p>
            </li>
            <li>
                <span><span class="counter">95.2</span>k</span>
                <p>Follower</p>
            </li>
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="home"></i><span>Dashboard</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('index') }}">Default</a></li>
                            <li><a href="{{ route('dashboard-02') }}">Ecommerce</a></li>
                        </ul>
                    </li>
                    @can('user_management_access')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ request()->is('admin/permissions*', 'admin/roles*', 'admin/users*') ? 'active' : '' }}"
                                href="javascript:void(0)"><i data-feather="home"></i><span>User Management</span></a>
                            <ul class="nav-submenu menu-content" style="display:;">
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
                            <a class="nav-link menu-title {{ request()->is('admin/accounts*') ? 'active' : '' }} "
                                href="javascript:void(0)"><i data-feather="home"></i><span>Account Management</span></a>
                            <ul class="nav-submenu menu-content" style="display:;">
                                @can('account_access')
                                    <li><a href="{{ route('admin.accounts.index') }}">Accounts</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="dropdown">
                                <a class="nav-link menu-title link-nav {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                                    href="{{ route('profile.password.edit') }}">
                                    <i data-feather="settings"></i><span>{{ trans('global.change_password') }}</span></a>
                            </li>
                        @endcan
                    @endif
                    <li class="dropdown">
                        <a class="nav-link menu-title " href="javascript:void(0)"><i
                                data-feather="airplay"></i><span>Widgets</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('general-widget') }}">General</a></li>
                            <li><a href="{{ route('chart-widget') }}">Chart</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Components</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title " href="javascript:void(0)"><i data-feather="box"></i><span>Ui
                                Kits</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('state-color') }}">State color</a></li>
                            <li><a href="{{ route('typography') }}">Typography</a></li>
                            <li><a href="{{ url('avatars') }}">Avatars</a></li>
                            <li><a href="{{ route('helper-classes') }}">helper classes</a></li>
                            <li><a href="{{ route('grid') }}">Grid</a></li>
                            <li><a href="{{ route('tag-pills') }}">Tag & pills</a></li>
                            <li><a href="{{ route('progress-bar') }}">Progress</a></li>
                            <li><a href="{{ route('modal') }}">Modal</a></li>
                            <li><a href="{{ route('alert') }}">Alert</a></li>
                            <li><a href="{{ route('popover') }}">Popover</a></li>
                            <li><a href="{{ route('tooltip') }}">Tooltip</a></li>
                            <li><a href="{{ route('loader') }}">Spinners</a></li>
                            <li><a href="{{ route('dropdown') }}">Dropdown</a></li>
                            <li><a href="{{ route('according') }}">Accordion</a></li>
                            <li>
                                <a class="submenu-title  {{ in_array(Route::currentRouteName(), ['tab-bootstrap', 'tab-material']) ? 'active' : '' }}"
                                    href="javascript:void(0)">
                                    Tabs<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span>
                                </a>
                                <ul class="nav-sub-childmenu submenu-content"
                                    style="display: {{ in_array(Route::currentRouteName(), ['tab-bootstrap', 'tab-material']) ? 'block' : 'none' }};">
                                    <li><a href="{{ route('tab-bootstrap') }}">Bootstrap Tabs</a></li>
                                    <li><a href="{{ route('tab-material') }}">Line Tabs</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('navs') }}">Navs</a></li>
                            <li><a href="{{ route('box-shadow') }}">Shadow</a></li>
                            <li><a href="{{ route('list') }}">Lists</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="folder-plus"></i><span>Bonus Ui</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('scrollable') }}">Scrollable</a></li>
                            <li><a href="{{ route('tree') }}">Tree view</a></li>
                            <li><a href="{{ route('bootstrap-notify') }}">Bootstrap Notify</a></li>
                            <li><a href="{{ route('rating') }}">Rating</a></li>
                            <li><a href="{{ route('dropzone') }}">dropzone</a></li>
                            <li><a href="{{ route('tour') }}">Tour</a></li>
                            <li><a href="{{ route('sweet-alert2') }}">SweetAlert2</a></li>
                            <li><a href="{{ route('modal-animated') }}">Animated Modal</a></li>
                            <li><a href="{{ route('owl-carousel') }}">Owl Carousel</a></li>
                            <li><a href="{{ route('ribbons') }}">Ribbons</a></li>
                            <li><a href="{{ route('pagination') }}">Pagination</a></li>
                            <li><a href="{{ route('steps') }}">Steps</a></li>
                            <li><a href="{{ route('breadcrumb') }}">Breadcrumb</a></li>
                            <li><a href="{{ route('range-slider') }}">Range Slider</a></li>
                            <li><a href="{{ route('image-cropper') }}">Image cropper</a></li>
                            <li><a href="{{ route('sticky') }}">Sticky </a></li>
                            <li><a href="{{ route('basic-card') }}">Basic Card</a></li>
                            <li><a href="{{ route('creative-card') }}">Creative Card</a></li>
                            <li><a href="{{ route('tabbed-card') }}">Tabbed Card</a></li>
                            <li><a href="{{ route('dragable-card') }}">Draggable Card</a></li>
                            <li>
                                <a class="submenu-title {{ in_array(Route::currentRouteName(), ['timeline-v-1', 'timeline-v-2']) ? 'active' : '' }}"
                                    href="javascript:void(0)">
                                    Timeline<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span>
                                </a>
                                <ul class="nav-sub-childmenu submenu-content"
                                    style="display: {{ in_array(Route::currentRouteName(), ['timeline-v-1', 'timeline-v-2']) ? 'block' : 'none' }};">
                                    <li><a href="{{ route('timeline-v-1') }}">Timeline 1</a></li>
                                    <li><a href="{{ route('timeline-v-2') }}">Timeline 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="edit-3"></i><span>Builders</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('form-builder-1') }}">Form Builder 1</a></li>
                            <li><a href="{{ route('form-builder-2') }}">Form Builder 2</a></li>
                            <li><a href="{{ route('pagebuild') }}">Page Builder</a></li>
                            <li><a href="{{ route('button-builder') }}">Button Builder</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="cloud-drizzle"></i><span>Animation</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('animate') }}">Animate</a></li>
                            <li><a href="{{ route('scroll-reval') }}">Scroll Reveal</a></li>
                            <li><a href="{{ route('aos') }}">AOS animation</a></li>
                            <li><a href="{{ route('tilt') }}">Tilt Animation</a></li>
                            <li><a href="{{ route('wow') }}">Wow Animation</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="command"></i><span>Icons</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('flag-icon') }}">Flag icon</a></li>
                            <li><a href="{{ route('font-awesome') }}">Fontawesome Icon</a></li>
                            <li><a href="{{ route('ico-icon') }}">Ico Icon</a></li>
                            <li><a href="{{ route('themify-icon') }}">Thimify Icon</a></li>
                            <li><a href="{{ route('feather-icon') }}">Feather icon</a></li>
                            <li><a href="{{ route('whether-icon') }}">Whether Icon </a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="cloud"></i><span>Buttons</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('buttons') }}">Default Style</a></li>
                            <li><a href="{{ route('buttons-flat') }}">Flat Style</a></li>
                            <li><a href="{{ route('buttons-edge') }}">Edge Style</a></li>
                            <li><a href="{{ route('raised-button') }}">Raised Style</a></li>
                            <li><a href="{{ route('button-group') }}">Button Group</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="bar-chart"></i><span>Charts</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('chart-apex') }}">Apex Chart</a></li>
                            <li><a href="{{ route('chart-google') }}">Google Chart</a></li>
                            <li><a href="{{ route('chart-sparkline') }}">Sparkline chart</a></li>
                            <li><a href="{{ route('chart-flot') }}">Flot Chart</a></li>
                            <li><a href="{{ route('chart-knob') }}">Knob Chart</a></li>
                            <li><a href="{{ route('chart-morris') }}">Morris Chart</a></li>
                            <li><a href="{{ route('chartjs') }}">Chatjs Chart</a></li>
                            <li><a href="{{ route('chartist') }}">Chartist Chart</a></li>
                            <li><a href="{{ route('chart-peity') }}">Peity Chart</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Forms</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="sliders"></i><span>Form Controls </span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('form-validation') }}">Form Validation</a></li>
                            <li><a href="{{ route('base-input') }}">Base Inputs</a></li>
                            <li><a href="{{ route('radio-checkbox-control') }}">Checkbox & Radio</a></li>
                            <li><a href="{{ route('input-group') }}">Input Groups</a></li>
                            <li><a href="{{ route('megaoptions') }}">Mega Options </a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="package"></i><span>Form Widgets</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('datepicker') }}">Datepicker</a></li>
                            <li><a href="{{ route('time-picker') }}">Timepicker</a></li>
                            <li><a href="{{ route('datetimepicker') }}">Datetimepicker</a></li>
                            <li><a href="{{ route('daterangepicker') }}">Daterangepicker</a></li>
                            <li><a href="{{ route('touchspin') }}">Touchspin</a></li>
                            <li><a href="{{ route('select2') }}">Select2</a></li>
                            <li><a href="{{ route('switch') }}">Switch</a></li>
                            <li><a href="{{ route('typeahead') }}">Typeahead</a></li>
                            <li><a href="{{ route('clipboard') }}">Clipboard </a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="layout"></i><span>Form layout</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('default-form') }}">Default Forms</a></li>
                            <li><a href="{{ route('form-wizard') }}">Form Wizard 1</a></li>
                            <li><a href="{{ route('form-wizard-two') }}">Form Wizard 2</a></li>
                            <li><a href="{{ route('form-wizard-three') }}">Form Wizard 3</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Table</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="server"></i><span>Bootstrap Tables </span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('bootstrap-basic-table') }}">Basic Tables</a></li>
                            <li><a href="{{ route('bootstrap-sizing-table') }}">Sizing Tables</a></li>
                            <li><a href="{{ route('bootstrap-border-table') }}">Border Tables</a></li>
                            <li><a href="{{ route('bootstrap-styling-table') }}">Styling Tables</a></li>
                            <li><a href="{{ route('table-components') }}">Table components</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="database"></i><span>Data Tables </span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('datatable-basic-init') }}">Basic Init</a></li>
                            <li><a href="{{ route('datatable-advance') }}">Advance Init</a></li>
                            <li><a href="{{ route('datatable-styling') }}">Styling</a></li>
                            <li><a href="{{ route('datatable-AJAX') }}">AJAX</a></li>
                            <li><a href="{{ route('datatable-server-side') }}">Server Side</a></li>
                            <li><a href="{{ route('datatable-plugin') }}">Plug-in</a></li>
                            <li><a href="{{ route('datatable-API') }}">API</a></li>
                            <li><a href="{{ route('datatable-data-source') }}">Data Sources</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="hard-drive"></i><span>Ex. Data Tables </span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('datatable-ext-autofill') }}">Auto Fill</a></li>
                            <li><a href="{{ route('datatable-ext-basic-button') }}">Basic Button</a></li>
                            <li><a href="{{ route('datatable-ext-col-reorder') }}">Column Reorder</a></li>
                            <li><a href="{{ route('datatable-ext-fixed-header') }}">Fixed Header</a></li>
                            <li><a href="{{ route('datatable-ext-key-table') }}">Key Table</a></li>
                            <li><a href="{{ route('datatable-ext-responsive') }}">Responsive</a></li>
                            <li><a href="{{ route('datatable-ext-row-reorder') }}"> Row Reorder</a></li>
                            <li><a href="{{ route('datatable-ext-scroller') }}">Scroller </a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('jsgrid-table') }}"><i
                                data-feather="file-text"></i><span>Js Grid Table</span></a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Applications</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="box"></i><span>Project </span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('projects') }}">Project List</a></li>
                            <li><a href="{{ route('projectcreate') }}">Create new </a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('file-manager') }}"><i
                                data-feather="git-pull-request"></i><span>File manager</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('kanban') }}"><i
                                data-feather="monitor"></i><span>Kanban Board</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="shopping-bag"></i><span>Ecommerce</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('product') }}">Product</a></li>
                            <li><a href="{{ route('product-page') }}">Product page</a></li>
                            <li><a href="{{ route('list-products') }}">Product list</a></li>
                            <li><a href="{{ route('payment-details') }}">Payment Details</a></li>
                            <li><a href="{{ route('order-history') }}">Order History</a></li>
                            <li><a href="{{ route('invoice-template') }}">Invoice</a></li>
                            <li><a href="{{ route('cart') }}">Cart</a></li>
                            <li><a href="{{ route('list-wish') }}">Wishlist</a></li>
                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                            <li><a href="{{ route('pricing') }}">Pricing</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="mail"></i><span>Email</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('email_inbox') }}">Mail Inbox</a></li>
                            <li><a href="{{ route('email_read') }}">Read mail</a></li>
                            <li><a href="{{ route('email_compose') }}">Compose</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="message-circle"></i><span>Chat</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('chat') }}">Chat App</a></li>
                            <li><a href="{{ route('chat-video') }}">Video chat</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="users"></i><span>Users</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('user-profile') }}">Users Profile</a></li>
                            <li><a href="{{ route('edit-profile') }}">Users Edit</a></li>
                            <li><a href="{{ route('user-cards') }}">Users Cards</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('bookmark') }}"><i
                                data-feather="heart"></i><span>Bookmarks</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('contacts') }}"><i
                                data-feather="list"></i><span>Contacts</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('task') }}"><i
                                data-feather="check-square"></i><span>Tasks</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('calendar-basic') }}"><i
                                data-feather="calendar"></i><span>Calender </span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('social-app') }}"><i
                                data-feather="zap"></i><span>Social App</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('to-do') }}"><i
                                data-feather="clock"></i><span>To-Do</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('search') }}"><i
                                data-feather="search"></i><span>Search Result</span></a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Pages</h6>
                        </div>
                    </li>
                    {{-- <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('landing-page') }}" class="{{routeActive('landing-page')}}"><i data-feather="navigation-2"></i><span>Landing page</span></a>
                    </li> --}}
                    <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('sample-page') }}"><i
                                data-feather="file"></i><span>Sample page</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('internationalization') }}"><i
                                data-feather="aperture"></i><span>Internationalization</span></a>
                    </li>
                    <li class="mega-menu">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="layers"></i><span>Others</span></a>
                        <div class="mega-menu-container menu-content" style="display:;">
                            <div class="container">
                                <div class="row">
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div class="submenu-title">
                                                <h5>Error Page</h5>
                                            </div>
                                            <div class="submenu-content opensubmegamenu">
                                                <ul>
                                                    <li><a href="{{ route('error-page1') }}" target="_blank">Error
                                                            page 1</a></li>
                                                    <li><a href="{{ route('error-page2') }}" target="_blank">Error
                                                            page 2</a></li>
                                                    <li><a href="{{ route('error-page3') }}" target="_blank">Error
                                                            page 3</a></li>
                                                    <li><a href="{{ route('error-page4') }}" target="_blank">Error
                                                            page 4 </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div class="submenu-title">
                                                <h5>Authentication</h5>
                                            </div>
                                            <div class="submenu-content opensubmegamenu">
                                                <ul>
                                                    <li><a href="{{ route('login') }}" target="_blank">Login
                                                            Simple</a></li>
                                                    <li><a href="{{ route('login_one') }}" target="_blank">Login
                                                            with bg image</a></li>
                                                    <li><a href="{{ route('login_two') }}" target="_blank">Login
                                                            with image two </a></li>
                                                    <li><a href="{{ route('login-bs-validation') }}"
                                                            target="_blank">Login With validation</a></li>
                                                    <li><a href="{{ route('login-bs-tt-validation') }}"
                                                            target="_blank">Login with tooltip</a></li>
                                                    <li><a href="{{ route('login-sa-validation') }}"
                                                            target="_blank">Login with sweetalert</a></li>
                                                    <li><a href="{{ route('sign-up') }}" target="_blank">Register
                                                            Simple</a></li>
                                                    <li><a href="{{ route('sign-up-one') }}"
                                                            target="_blank">Register with Bg Image </a></li>
                                                    <li><a href="{{ route('sign-up-two') }}"
                                                            target="_blank">Register with Bg video </a></li>
                                                    <li><a href="{{ route('unlock') }}">Unlock User</a></li>
                                                    <li><a href="{{ route('forget-password') }}">Forget Password</a>
                                                    </li>
                                                    <li><a href="{{ route('creat-password') }}">Creat Password</a>
                                                    </li>
                                                    <li><a href="{{ route('maintenance') }}">Maintenance</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div class="submenu-title">
                                                <h5>Coming Soon</h5>
                                            </div>
                                            <div class="submenu-content opensubmegamenu">
                                                <ul>
                                                    <li><a href="{{ route('comingsoon') }}">Coming Simple</a></li>
                                                    <li><a href="{{ route('comingsoon-bg-video') }}">Coming with Bg
                                                            video</a></li>
                                                    <li><a href="{{ route('comingsoon-bg-img') }}">Coming with Bg
                                                            Image</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div class="submenu-title">
                                                <h5>Email templates</h5>
                                            </div>
                                            <div class="submenu-content opensubmegamenu">
                                                <ul>
                                                    <li><a href="{{ route('basic-template') }}">Basic Email</a></li>
                                                    <li><a href="{{ route('email-header') }}">Basic With Header</a>
                                                    </li>
                                                    <li><a href="{{ route('template-email') }}">Ecomerce Template</a>
                                                    </li>
                                                    <li><a href="{{ route('template-email-2') }}">Email Template
                                                            2</a></li>
                                                    <li><a href="{{ route('ecommerce-templates') }}">Ecommerce
                                                            Email</a></li>
                                                    <li><a href="{{ route('email-order-success') }}">Order Success
                                                        </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Miscellaneous</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="image"></i><span>Gallery</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('gallery') }}">Gallery Grid</a></li>
                            <li><a href="{{ route('gallery-with-description') }}">Gallery Grid Desc</a></li>
                            <li><a href="{{ route('gallery-masonry') }}">Masonry Gallery</a></li>
                            <li><a href="{{ route('masonry-gallery-with-disc') }}">Masonry with Desc</a></li>
                            <li><a href="{{ route('gallery-hover') }}">Hover Effects</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="edit"></i><span>Blog</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('blog') }}">Blog Details</a></li>
                            <li><a href="{{ route('blog-single') }}">Blog Single</a></li>
                            <li><a href="{{ route('add-post') }}">Add Post</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('faq') }}"><i
                                data-feather="help-circle"></i><span>FAQ</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="user-check"></i><span>Job Search</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('job-cards-view') }}">Cards view</a></li>
                            <li><a href="{{ route('job-list-view') }}">List View</a></li>
                            <li><a href="{{ route('job-details') }}">Job Details</a></li>
                            <li><a href="{{ route('job-apply') }}">Apply</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="layers"></i><span>Learning</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('learning-list-view') }}">Learning List</a></li>
                            <li><a href="{{ route('learning-detailed') }}">Detailed Course</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="map"></i><span>Maps</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('map-js') }}">Maps JS</a></li>
                            <li><a href="{{ route('vector-map') }}">Vector Maps</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="git-pull-request"></i><span>Editors</span></a>
                        <ul class="nav-submenu menu-content" style="display:;">
                            <li><a href="{{ route('summernote') }}">Summer Note</a></li>
                            <li><a href="{{ route('ckeditor') }}">CK editor</a></li>
                            <li><a href="{{ route('simple-MDE') }}">MDE editor</a></li>
                            <li><a href="{{ route('ace-code-editor') }}">ACE code editor</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('knowledgebase') }}"><i
                                data-feather="database"></i><span>Knowledgebase</span></a>
                    </li> --}}
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
