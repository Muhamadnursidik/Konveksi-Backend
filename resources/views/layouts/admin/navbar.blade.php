<header class="nxl-header">
    <div class="header-wrapper">

        {{-- LEFT --}}
        <div class="header-left d-flex align-items-center gap-4">
            <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </a>

            <div class="nxl-navigation-toggle">
                <a href="javascript:void(0);" id="menu-mini-button">
                    <i class="feather-align-left"></i>
                </a>
                <a href="javascript:void(0);" id="menu-expend-button" style="display:none">
                    <i class="feather-arrow-right"></i>
                </a>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="header-right ms-auto">
            <div class="d-flex align-items-center">

                {{-- Fullscreen --}}
                <div class="nxl-h-item d-none d-sm-flex">
                    <div class="full-screen-switcher">
                        <a href="javascript:void(0);" class="nxl-head-link me-0"
                            onclick="$('body').fullScreenHelper('toggle');">
                            <i class="feather-maximize maximize"></i>
                            <i class="feather-minimize minimize"></i>
                        </a>
                    </div>
                </div>
                <div class="nxl-h-item dark-light-theme">
                    <a href="javascript:void(0);" class="nxl-head-link me-0 dark-button">
                        <i class="feather-moon"></i>
                    </a>
                    <a href="javascript:void(0);" class="nxl-head-link me-0 light-button" style="display: none">
                        <i class="feather-sun"></i>
                    </a>
                </div>

                {{-- Notifications (dummy dulu) --}}
                <div class="dropdown nxl-h-item">
                    <a class="nxl-head-link me-3" data-bs-toggle="dropdown">
                        <i class="feather-bell"></i>
                        <span class="badge bg-danger nxl-h-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown">
                        <div class="px-3 py-2 fw-semibold">Notifications</div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Belum ada notif penting</a>
                    </div>
                </div>

                {{-- User --}}
                <div class="dropdown nxl-h-item">
                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('assets/images/avatar/default.png') }}"
                            class="img-fluid user-avtar" alt="user" />
                    </a>

                    <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
                        <div class="dropdown-header">
                            <div class="d-flex align-items-center">
                                <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('assets/images/avatar/default.png') }}"
                                    class="img-fluid user-avtar" />
                                <div class="ms-2">
                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                    <span class="fs-12 text-muted">{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="dropdown-item">
                            <i class="feather-user me-2"></i> Profile
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="feather-settings me-2"></i> Settings
                        </a>

                        <div class="dropdown-divider"></div>

                        {{-- Logout --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="feather-log-out me-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</header>
