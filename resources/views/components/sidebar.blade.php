<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Apotek Arema</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">AA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Apoteker</li>
            <li class="{{ Request::is('pengguna') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('pengguna') }}"><i class="fas fa-user"></i>
                    <span>Pengguna</span></a>
            </li>
            <li class="{{ Request::is('kasir') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('kasir') }}"><i class="fas fa-cash-register"></i>
                    <span>Kasir</span></a>
            </li>
            <li class="{{ Request::is('penjualan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('penjualan') }}"><i class="fas fa-money-bill-wave"></i>
                    <span>Penjualan</span></a>
            </li>
            <li class="{{ Request::is('obat') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('obat') }}"><i class="fas fa-pills"></i>
                    <span>Obat</span></a>
            </li>
            <li class="{{ Request::is('resep-obat') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('resep-obat') }}"><i class="fas fa-prescription"></i>
                    <span>Resep
                        Obat</span></a>
            </li>
            <li class="{{ Request::is('racikan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('racikan') }}"><i class="fas fa-prescription-bottle"></i>
                    <span>Racikan</span></a>
            </li>
            <li class="{{ Request::is('customer') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('customer') }}"><i class="fas fa-address-book"></i>
                    <span>Customer</span></a>
            </li>
            <li class="{{ Request::is('dokter') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dokter') }}"><i class="fas fa-user-doctor"></i>
                    <span>Dokter</span></a>
            </li>
            <li class="{{ Request::is('jasa') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('jasa') }}"><i class="fas fa-user-nurse"></i>
                    <span>Jasa</span></a>
            </li>
            <li class="{{ Request::is('laporan-penjualan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('laporan-penjualan') }}"><i class="fas fa-file-alt"></i>
                    <span>Laporan Penjualan</span></a>
            </li>
    </aside>
</div>
