<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl">

        <!--  Brand demo (display only for navbar-full and hide on below xl) -->
        <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4 d-xl-none">
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
            </a>
        </div>

        <!-- ! Not required for layout-without-menu -->
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="bx bx-menu bx-md"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- Style Switcher -->
                <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="bx bx-md bx-sun"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                        <li>
                            <a class="dropdown-item active" href="javascript:void(0);" data-theme="light">
                                <span><i class="bx bx-sun bx-md me-3"></i>Light</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                <span><i class="bx bx-moon bx-md me-3"></i>Dark</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                <span><i class="bx bx-desktop bx-md me-3"></i>System</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ Style Switcher -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
                        data-bs-toggle="dropdown">
                        <div class="d-flex">
                            <div class="avatar avatar-online">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/1.png"
                                    alt="" class="w-px-40 h-auto rounded-circle">
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0">
                                    John Doe
                                </h6>
                                <small class="text-muted">Admin</small>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item"
                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-5/pages/profile-user">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/1.png"
                                                alt="" class="w-px-40 h-auto rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">
                                            John Doe
                                        </h6>
                                        <small class="text-muted">Admin</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider my-1"></div>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-5/pages/profile-user">
                                <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-5/pages/profile-user">
                                <i class="bx bx-user bx-md me-3"></i><span>Change Password</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider my-1"></div>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-5/auth/login-basic">
                                <i class="bx bx-log-in bx-md me-3"></i><span>Login</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>

    </div>
</nav>
