<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-brand" href="{{ url('admin/dashboard') }}">
            <span class="align-middle">Admin</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('admin/dokter') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/dokter') }}">
                    <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Dokter</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('admin/pasien') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/pasien') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Pasien</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('admin/poli') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/poli') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Poli</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('admin/obat') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/obat') }}">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Obat</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
