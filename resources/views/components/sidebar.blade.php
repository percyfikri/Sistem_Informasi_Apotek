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
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Apoteker</li>
            @if (Auth::user()->status == 'admin')
                <li class="{{ Request::is('pengguna') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('pengguna') }}"><i class="fas fa-user"></i>
                        <span>Pengguna</span></a>
                </li>
            @endif

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
    </aside>
</div>
