<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Dokter</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ Request::is('dokter/dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('dokter/dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('dokter/profile') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('dokter/profile') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('dokter/jadwal_periksa') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('dokter/jadwal_periksa') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Jadwal Periksa</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('dokter/periksa') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('dokter/periksa') }}">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Periksa Pasien</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('dokter/riwayat') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('dokter/riwayat') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Riwayat Pasien</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
