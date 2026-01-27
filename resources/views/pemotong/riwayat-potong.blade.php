<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    @include('layouts/pemotong/head-page-meta', ['title' => 'Home'])
    @include('layouts/pemotong/head-css')
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    @include('layouts/pemotong/sidebar')
    @include('layouts/pemotong/navbar')

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="page-header-title">
                        <h5 class="mb-0 font-medium">Master Data</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('pemotong.data-bahan-baku.index') }}">Data Bahan Baku</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Riwayat</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="grid grid-cols-12 gap-x-6">

                <div class="col-span-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>Riwayat Job Dipotong</h5>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Model</th>
                                            <th>Bahan Baku</th>
                                            <th>Target</th>
                                            <th>Status</th>
                                            <th>Waktu Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($jobs as $job)
                                            <tr>
                                                <td>{{ $job->jobProduksi->modelPakaian->nama_model }}</td>
                                                <td>{{ $job->jobProduksi->bahanBaku->nama_bahan }}</td>
                                                <td>{{ $job->jobProduksi->jumlah_target }}</td>
                                                <td>
                                                    <span class="pc-badge pc-badge-info">
                                                        Selesai Dipotong
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $job->updated_at->format('d M Y H:i') }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">
                                                    Belum ada riwayat potong
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    @include('layouts/pemotong/footer-block')
    @include('layouts/pemotong/footer-js')
</body>
<!-- [Body] end -->

</html>
