<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    @include('layouts/finishing/head-page-meta', ['title' => 'Home'])
    @include('layouts/finishing/head-css')
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    @include('layouts/finishing/sidebar')
    @include('layouts/finishing/navbar')

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
                        <li class="breadcrumb-item"><a href="{{ route('finishing.job-finishing.index') }}">Data Job
                                Finishing</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Index</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="card">
                <div class="card-header">
                    <h5>Job Finishing & Packing</h5>
                </div>
                <x-alert />

                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Model</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th width="160">Aksi</th>
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
                                        <span class="badge bg-info">Siap Finishing</span>
                                    </td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('finishing.job-finishing.selesai', $job->id) }}">
                                            @csrf
                                            <button class="btn btn-primary btn-sm w-full">
                                                Selesai Packing
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        Tidak ada job finishing
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
    @include('layouts/finishing/footer-block')
    @include('layouts/finishing/footer-js')
</body>
<!-- [Body] end -->

</html>
