<!-- Brand Logo -->

<a href="index3.html" class="brand-link">
    <img src="{{ asset('/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Data Karyawan</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('/assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">
                {{-- <strong>{{ session()->get('userName') }}</strong> --}}
            </a>
        </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
            <li class="nav-item">
                {{-- <a href="{{ route('dashboard.index') }}" --}}
                <a href="#"
                    {{-- class="nav-link {{ request()->path() == '/dashboard' ? 'active' : '' }}"> --}}
                    class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>

            </li>
            {{-- @if (session()->get('role') == 1) --}}
                <li class="nav-item">
                    <a href="{{ route('karyawan.index') }}"
                        {{-- class="nav-link {{ request()->path() == '/userview' ? 'active' : '' }}"> --}}
                        class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Karyawan
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('departement.index') }}"
                        {{-- class="nav-link {{ request()->path() == '/kategori' ? 'active' : '' }}"> --}}
                        class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Departement
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
            {{-- @endif --}}

            {{-- @if (session()->get('role') == 1 || session()->get('role') == 2) --}}
                <li class="nav-item">
                    {{-- <a href="{{ route('laporanview.index') }}" --}}
                    <a href="#"
                        {{-- class="nav-link {{ request()->segment(2) == '/laporanview' ? 'active' : '' }}">  --}}
                        class="nav-link">
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
