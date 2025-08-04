<!-- Brand Logo -->

<a href="index3.html" class="brand-link">
    <img src="{{ asset('/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Data Karyawan</span>
</a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="image">
            <img src="{{ asset('/assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image" style="width: 35px; height: 35px; object-fit: cover;">
        </div>
        <div class="info d-flex flex-column ms-2">
            <span class="fw-bold text-white">{{ session('name') }}</span>
            <small class="text-muted">{{ session('role') }}</small>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}"
                    class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>
            </li>

            @if (session()->get('role') == 'Super Admin')
                <li class="nav-item">
                    <a href="{{ route('departement.index') }}"
                        class="nav-link {{ request()->is('departement*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Departement
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
            @endif

            @if (in_array(session()->get('role'), ['Super Admin', 'Admin']))
                <li class="nav-item">
                    <a href="{{ route('karyawan.index') }}"
                        class="nav-link {{ request()->is('karyawan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Karyawan
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
            @endif


            {{-- @if (session()->get('role') == 1 || session()->get('role') == 2) --}}
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}"                
                        class="nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('auth.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
            {{-- @endif --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
