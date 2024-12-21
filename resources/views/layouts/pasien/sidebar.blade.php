<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Pasien</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ Request::is('pasien/dashboard') ? 'active' : '' }}"">
                <a class="sidebar-link" href="{{ url('pasien/dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('pasien/daftar_poli') ? 'active' : '' }}"">
                <a class="sidebar-link" href="{{ url('pasien/daftar_poli') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Daftar Poli</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
