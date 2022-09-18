<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>

                {{-- category section start  --}}
                <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/add-category') ? ' collapse active' : 'collapsed'}}"
                   href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div
                    class="collapse {{ Request::is('admin/category') || Request::is('admin/add-category') ? 'show' : ''}} "
                    id="collapseCategory" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add-category') ? 'active' : ''}}"
                           href="{{ url('admin/add-category') }}">Add Category</a>
                        <a class="nav-link {{ Request::is('admin/category') ? 'active' : ''}}"
                           href="{{ url('admin/category') }}">View Category</a>
                    </nav>
                </div>
                {{-- category section end  --}}

                {{-- channels section start  --}}
                <a class="nav-link {{ Request::is('admin/channels') || Request::is('admin/add-channel') ? ' collapse active' : 'collapsed'}} "
                   href="#" data-bs-toggle="collapse" data-bs-target="#collapseChannels"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i></div>
                    Channels
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/channels') || Request::is('admin/add-channel') ? 'show' : ''}}" id="collapseChannels" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add-channel') ? 'active' : ''}}" href="{{ url('admin/add-channel') }}">Add Channel</a>
                        <a class="nav-link {{ Request::is('admin/channels') ? 'active' : ''}}" href="{{ url('admin/channels') }}">View Channels</a>
                    </nav>
                </div>
                {{-- channels section end  --}}

                {{-- Advertisement section start  --}}
                <a class="nav-link {{ Request::is('admin/ad') || Request::is('admin/add-ad') ? ' collapse active' : 'collapsed'}} "
                   href="#" data-bs-toggle="collapse" data-bs-target="#collapseAd"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-rectangle-ad"></i></div>
                    Advertisement
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/ad') || Request::is('admin/add-ad') ? 'show' : ''}}" id="collapseAd" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add-ad') ? 'active' : ''}}" href="{{ url('admin/add-ad') }}">Add Advertisement</a>
                        <a class="nav-link {{ Request::is('admin/ad') ? 'active' : ''}}" href="{{ url('admin/ad') }}">View Advertisement</a>
                    </nav>
                </div>
                {{-- Advertisement section end  --}}

                {{-- users section start  --}}
                <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/add-user') ? ' collapse active' : 'collapsed'}} "
                   href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/users') || Request::is('admin/add-user') ? 'show' : ''}} " id="collapseUsers" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add-user') ? 'active' : ''}}" href="{{ url('admin/add-user') }}">Add User</a>
                        <a class="nav-link {{ Request::is('admin/users') ? 'active' : ''}}" href="{{ url('admin/users') }}">View Users</a>
                    </nav>
                </div>
                {{-- users section end  --}}


                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                   aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                           data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                             data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                           data-bs-target="#pagesCollapseError" aria-expanded="false"
                           aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                             data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
