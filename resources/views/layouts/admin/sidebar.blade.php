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
                    <label>Master Data</label>
                    <i data-feather="feather"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('admin.bahan-baku.index') }}" class="pc-link">
                        <span class="pc-micon"> <i class="bi bi-boxes"></i></i></span>
                        <span class="pc-mtext">Bahan Baku</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('admin.model-pakaian.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="bi bi-person-bounding-box"></i></span>
                        <span class="pc-mtext">Model Pakaian</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link"><span class="pc-micon"><i class="bi bi-people"></i>
                        </span><span class="pc-mtext">User & Role</span><span class="pc-arrow"><i
                                class="ti ti-chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('admin.pemotong.index')}}">Pemotong</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('admin.penjahit.index') }}">Penjahit</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('admin.finishing.index') }}">Finishing</a></li>
                    </ul>
                </li>

                <li class="pc-item pc-caption">
                    <label>Produksi</label>
                    <i data-feather="sidebar"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('admin.job-produksi.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="bi bi-activity"></i></span>
                        <span class="pc-mtext">Data Produksi</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Produk Jadi</label>
                    <i data-feather="sidebar"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('admin.produk-jadi') }}" class="pc-link">
                        <span class="pc-micon"><i class="bi bi-box-seam"></i></span>
                        <span class="pc-mtext">Stok Produk Jadi</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Laporan</label>
                    <i data-feather="sidebar"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="../elements/bc_typography.html" class="pc-link">
                        <span class="pc-micon"><i class="bi bi-file-earmark-text"></i></span>
                        <span class="pc-mtext">Laporan Produksi</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="../elements/bc_typography.html" class="pc-link">
                        <span class="pc-micon"><i class="bi bi-file-earmark-text"></i></span>
                        <span class="pc-mtext">Laporan Bahan Baku</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="../elements/bc_typography.html" class="pc-link">
                        <span class="pc-micon"><i class="bi bi-file-earmark-text"></i></span>
                        <span class="pc-mtext">Laporan Produk Jadi</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->
