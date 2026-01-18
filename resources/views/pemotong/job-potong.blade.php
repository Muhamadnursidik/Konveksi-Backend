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
                        <li class="breadcrumb-item"><a href="{{ route('pemotong.data-bahan-baku.index') }}">Data Bahan
                                Baku</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Index</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="grid grid-cols-12 gap-x-6">

                <div class="col-span-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>Job Menunggu Dipotong</h5>
                        </div>
                        <x-alert />

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Model</th>
                                            <th>Bahan Baku</th>
                                            <th>Target</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($jobs as $job)
                                            <tr>
                                                <td>{{ $job->modelPakaian->nama_model }}</td>
                                                <td>{{ $job->bahanBaku->nama_bahan }}</td>
                                                <td>{{ $job->jumlah_target }}</td>
                                                <td>
                                                    <span class="pc-badge pc-badge-secondary">
                                                        {{ $job->status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <form method="POST"
                                                        action="{{ route('pemotong.job-potong.selesai', $job->id) }}">
                                                        @csrf
                                                        <button class="btn btn-success btn-sm">
                                                            Selesai Potong
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">
                                                    Tidak ada job menunggu
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
