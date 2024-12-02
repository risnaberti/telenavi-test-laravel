<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="z-index: 501;">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
            </span>
            <div class="app-brand-text demo menu-text ms-2" style="font-size: 20px;">
                <span class="fw-bold">SMP MUGA YOGYA</span>
                <br>
                <small class="fw-semibold">Sistem Pendaftaran Tryout </small>
            </div>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="py-1 menu-inner">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->route()->getName() == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li
            class="menu-item {{ in_array(request()->route()->getName(), ['pendaftaran-tryout.index', '']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-briefcase"></i>
                <div class="text-truncate" data-i18n="Master">Master Data</div>
                {{-- <span class="badge rounded-pill bg-danger ms-auto">5</span> --}}
            </a>
            <ul class="menu-sub">
                <li
                    class="menu-item {{ request()->route()->getName() == 'pendaftaran-tryout.daftar-by-admin' ? 'active' : '' }}">
                    <a href="{{-- route('pendaftaran-tryout.daftar-by-admin') --}}" class="menu-link">
                        <div class="text-truncate" data-i18n="Daftar By Admin">Daftar By Admin</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->route()->getName() == 'pendaftaran-tryout.index' ? 'active' : '' }}">
                    <a href="{{ route('pendaftaran-tryout.index') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Pendaftaran Tryout">Pendaftaran Tryout</div>
                    </a>
                </li>
            </ul>
        </li>

        <li
            class="menu-item {{ request()->route()->getName() == 'pendaftaran-tryout.rekap-pendaftar' ? 'active' : '' }}">
            <a href="{{-- route('pendaftaran-tryout.rekap-pendaftar') --}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-check"></i>
                <div class="text-truncate" data-i18n="Rekap Pendaftar">Rekap Pendaftar</div>
            </a>
        </li>

        <li
            class="menu-item {{ request()->route()->getName() == 'pendaftaran-tryout.laporan-pembayaran' ? 'active' : '' }}">
            <a href="{{-- route('pendaftaran-tryout.laporan-pembayaran') --}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div class="text-truncate" data-i18n="Laporan Pembayaran">Laporan Pembayaran</div>
            </a>
        </li>

        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
        <li class="menu-item">
            <a href="#"
                class="menu-link menu-toggle {{ request()->route()->getName() == 'pendaftaran-tryout.index' ? 'active' : '' }}">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Manajemen User</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{-- route('user') --}}" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Basic">Users</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{-- route('role') --}}" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Basic">Roles</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{-- route('permission') --}}" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Basic">Permissions</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <x-input.confirm-button text="Anda akan keluar dari akun ini!" positive="Ya, keluar!" icon="info"
                    class="text-white menu-link bg-dark">
                    <i class="menu-icon tf-icons bx bx-exit"></i>
                    <div class="text-truncate" data-i18n="Logout">Logout</div>
                </x-input.confirm-button>
            </form>
        </li>
    </ul>
</aside>
