<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            {{-- <i class="fas fa-clipboard"></i> --}}
            <img src="{{ asset('icon/alarm.png') }}" alt="" style="width: 35px;">
        </div>
        <div class="sidebar-brand-text mx-3">Lapor Pak <sup>👋</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li
        class="nav-item 
    {{ request()->is('data_masyarakat') ? 'active' : '' }}
    {{ request()->is('data_masyarakat/create') ? 'active' : '' }}
    {{ request()->is('data_masyarakat/edit/*') ? 'active' : '' }}
    {{ request()->is('data_masyarakat/show/*') ? 'active' : '' }}
        ">
        <a class="nav-link" href="{{ route('data_masyarakat') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Masyarakat</span></a>
    </li>
    <li
        class="nav-item
    {{ request()->is('data_kategori_laporan') ? 'active' : '' }}
    {{ request()->is('data_kategori_laporan/create') ? 'active' : '' }}
    {{ request()->is('data_kategori_laporan/show/*') ? 'active' : '' }}
    {{ request()->is('data_kategori_laporan/edit/*') ? 'active' : '' }}
    ">
        <a class="nav-link" href="{{ route('data_kategori_laporan') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Kategori</span></a>
    </li>
    <li
        class="nav-item
    {{ request()->is('data_laporan') ? 'active' : '' }}
    {{ request()->is('data_laporan/create') ? 'active' : '' }}
    {{ request()->is('data_laporan/show/*') ? 'active' : '' }}
    {{ request()->is('data_laporan/edit/*') ? 'active' : '' }}
    {{ request()->is('progress/create/*') ? 'active' : '' }}
    {{ request()->is('progress/edit/*') ? 'active' : '' }}
    ">
        <a class="nav-link" href="{{ route('data_laporan') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Laporan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="return logout()">
            <i class="fas fa-fw fa-power-off"></i>
            <span>Logout</span></a>
    </li>
</ul>
