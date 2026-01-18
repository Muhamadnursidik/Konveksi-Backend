<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    @include('layouts/penjahit/head-page-meta', ['title' => 'Home'])
    @include('layouts/penjahit/head-css')
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    @include('layouts/penjahit/sidebar')
    @include('layouts/penjahit/navbar')

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
                        <li class="breadcrumb-item"><a href="{{ route('penjahit.data-model-pakaian.index') }}">Data Model
                                Pakaian</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Index</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="card">
                <div class="card-header">
                    <h5>Job Jahit</h5>
                </div>
                <x-alert />

                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Model</th>
                                <th>Target</th>
                                <th>Status</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jobs as $job)
                                <tr>
                                    <td>
                                        <strong>{{ $job->modelPakaian->nama_model }}</strong><br>
                                        <small>{{ $job->modelPakaian->kategori }}</small>
                                    </td>
                                    <td>{{ $job->jumlah_target }}</td>
                                    <td>
                                        <span class="pc-badge pc-badge-warning">belum Dijahit</span>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('penjahit.job-jahit.selesai', $job->id) }}">
                                            @csrf
                                            <button class="btn btn-success btn-sm w-full">
                                                Selesai Jahit
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        Tidak ada job jahit
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    @include('layouts/penjahit/footer-block')
    @include('layouts/penjahit/footer-js')
</body>
<!-- [Body] end -->

</html>
