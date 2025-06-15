@if(Auth::user()->role === "mahasiswa")

<div id="app">
    <div id="sidebar" class='active'>
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <img src="assets/images/logo.svg" alt="" srcset="">
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class='sidebar-title'>Main Menu</li>
                    <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }} ">
                        <a href="{{ Route('dashboard') }}" class="sidebar-link ">
                            <i data-feather="home" width="20"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('profile') ? 'active' : '' }} ">
                        <a href="{{ Route('profile') }}" class='sidebar-link'>
                            <i data-feather="user" width="20"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('jadwal') ? 'active' : '' }} ">
                        <a href="{{ Route('mahasiswa.jadwal') }}" class='sidebar-link'>
                            <i data-feather="calendar" width="20"></i>
                            <span>Jadwal Kuliah</span>
                        </a>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="#" class='sidebar-link'>
                            <i data-feather="bell" width="20"></i>
                            <span>Mading</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    @endif

    @if(Auth::user()->role === "dosen")

    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/logo.svg" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Main Menu</li>
                        <li class="sidebar-item active ">
                            <a href="index.html" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="calendar" width="20"></i>
                                <span>Jadwal Kuliah</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="bell" width="20"></i>
                                <span>Mading</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="bell" width="20"></i>
                                <span>Absen Mahasiswa</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        @endif

        @if(Auth::user()->role === "admin")

    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/logo.svg" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Main Menu</li>
                        <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }} ">
                            <a href="{{ Route('dashboard') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->routeIs('profile') ? 'active' : '' }} ">
                        <a href="{{ Route('profile') }}" class='sidebar-link'>
                            <i data-feather="user" width="20"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                        <li class="sidebar-item {{ request()->routeIs('users') ? 'active' : '' }} ">
                            <a href="{{ Route('users') }}" class='sidebar-link'>
                                <i data-feather="users" width="20"></i>
                                <span>User</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('jadwal') ? 'active' : '' }} ">
                            <a href="{{ Route('jadwal') }}" class='sidebar-link'>
                                <i data-feather="calendar" width="20"></i>
                                <span>Jadwal Kuliah</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('matkul') ? 'active' : '' }} ">
                            <a href="{{ Route('matkul') }}" class='sidebar-link'>
                                <i data-feather="book" width="20"></i>
                                <span>Mata Kuliah</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('prodi') ? 'active' : '' }} ">
                            <a href="{{ Route('prodi') }}" class='sidebar-link'>
                                <i data-feather="layout" width="20"></i>
                                <span>Prodi</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('kelas') ? 'active' : '' }} ">
                            <a href="{{ Route('kelas') }}" class='sidebar-link'>
                                <i data-feather="briefcase" width="20"></i>
                                <span>Kelas</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('mading') ? 'active' : '' }} ">
                            <a href="{{ Route('mading') }}" class='sidebar-link'>
                                <i data-feather="bell" width="20"></i>
                                <span>Mading</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        @endif
