<!-- [ Pre-loader ] start -->
<div class="loader-bg fixed inset-0 bg-white dark:bg-themedark-cardbg z-[1034]">
    <div class="loader-track h-[5px] w-full inline-block absolute overflow-hidden top-0">
        <div
            class="loader-fill w-[300px] h-[5px] bg-primary-500 absolute top-0 left-0 animate-[hitZak_0.6s_ease-in-out_infinite_alternate]">
        </div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header flex items-center py-4 px-6 h-header-height">
            <a href="{{ route('dashboard') }}" class="b-brand flex items-center gap-3">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{ asset('/assets/images/logo-white.svg') }}" class="img-fluid logo logo-lg" alt="logo" />
                <img src="{{ asset('/assets/images/favicon.svg') }}" class="img-fluid logo logo-sm" alt="logo" />
            </a>
        </div>
        <div class="navbar-content h-[calc(100vh_-_74px)] py-2.5">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Dashboard</label>
                </li>
                <li class="pc-item">
                <li class="pc-item">
                    <a href="{{ route('dashboard') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Menu</label>
                    <i data-feather="feather"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('pemotong.data-bahan-baku.index') }}" class="pc-link">
                        <span class="pc-micon"> <i class="bi bi-boxes"></i></i></span>
                        <span class="pc-mtext">Data Bahan Baku</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('admin.job-produksi.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="bi bi-activity"></i></span>
                        <span class="pc-mtext">Job Potong</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="../elements/bc_typography.html" class="pc-link">
                        <span class="pc-micon"><i class="bi bi-clipboard-pulse"></i></i></span>
                        <span class="pc-mtext">Riwayat Pekerjaan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->
