<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
            </span>
            <div class="app-brand-text demo menu-text fw-bold ms-2" style="font-size: 20px;">
                Sistem
                <br>
                Pendaftaran
                Tryout
            </div>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="py-1 menu-inner">
        <!-- Dashboards -->
        <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                <span class="badge rounded-pill bg-danger ms-auto">5</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item active">
                    <a href="index.html" class="menu-link">
                        <div class="text-truncate" data-i18n="Analytics">Analytics</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/dashboards-crm.html"
                        target="_blank" class="menu-link">
                        <div class="text-truncate" data-i18n="CRM">CRM</div>
                        <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro
                        </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-ecommerce-dashboard.html"
                        target="_blank" class="menu-link">
                        <div class="text-truncate" data-i18n="eCommerce">eCommerce</div>
                        <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro
                        </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-logistics-dashboard.html"
                        target="_blank" class="menu-link">
                        <div class="text-truncate" data-i18n="Logistics">Logistics</div>
                        <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro
                        </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-academy-dashboard.html" target="_blank" class="menu-link">
                        <div class="text-truncate" data-i18n="Academy">Academy</div>
                        <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro
                        </div>
                    </a>
                </li>
            </ul>
        </li>


        <!-- Form Validation -->
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/form-validation.html"
                target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-check"></i>
                <div class="text-truncate" data-i18n="Form Validation">Form Validation</div>
                <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div>
            </a>
        </li>
        <!-- Tables -->
        <li class="menu-item">
            <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div class="text-truncate" data-i18n="Tables">Tables</div>
            </a>
        </li>
        <!-- Data Tables -->
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/tables-datatables-basic.html"
                target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-grid"></i>
                <div class="text-truncate" data-i18n="Datatables">Datatables</div>
                <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div>
            </a>
        </li>

        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Manajemen User</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="auth-login-basic.html" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Basic">Users</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="auth-register-basic.html" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Basic">Roles</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
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
