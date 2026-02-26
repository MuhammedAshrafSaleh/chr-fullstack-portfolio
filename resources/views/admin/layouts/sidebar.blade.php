<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto"></div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi,{{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item active">
                <a href="index.html" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Dropdown</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="">test</a></li>

                </ul>
            </li>
            <li class="menu-header">Pages</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Home</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.hero.edit') }}">1. Hero Section</a></li>
                    <li><a class="nav-link" href="{{ route('admin.about_home.edit') }}">2. About Home Section</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>About</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li>
                        <a class="nav-link" href="{{ route('admin.chr_about.edit') }}">1. CHR About</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.about_numbers.index') }}">2. About Numbers</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.testimonials.index') }}">3. Testimonials</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.about_ceo.edit') }}">4. About CEO</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.features.index') }}">5. Features</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.team.index') }}">6. Team</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.about_headings.edit') }}">7. About Headings</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Contact Us Page</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.coordinates.edit') }}">1. Map</a></li>
                    <li><a class="nav-link" href="{{ route('admin.contact_locations.edit') }}">2. Contact Locations</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Previous Projects</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.previous_projects.index') }}">Previous Projects</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Current Projects</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.current_projects.index') }}">Current Projects</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Blogs</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.blogs.index') }}">Blogs</a>
                    </li>
                </ul>
            </li>

            {{-- <li>
                <a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a>
            </li> --}}
        </ul>
    </aside>
</div>