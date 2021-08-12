<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle elevation-2"
                    alt="{{ Auth::user()->name }}">
            </div>
            <div class="info">
                <a href="{{ route('dashboard') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('profile.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            {{ __('Profile') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            {{ __('Manage Ebook') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('ebook.category.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Ebook Category') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ebook.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Ebook') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <form class="nav-item" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();this.closest('form').submit();">
                        <i class="fas fa-power-off nav-icon"></i>
                        <p>
                            {{ __('Log Out') }}
                        </p>
                    </a>
                </form>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
