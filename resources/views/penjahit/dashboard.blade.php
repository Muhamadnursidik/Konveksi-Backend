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
            @include('layouts/penjahit/breadcrumb', [
                'breadcrumb-item' => 'Dashboard',
                'Dashboard penjahit' => 'Default',
            ])
            <!-- [ Main Content ] start -->
            <div class="grid grid-cols-12 gap-6">

                {{-- CARD RINGKASAN --}}
                <div class="col-span-12 xl:col-span-3 md:col-span-6">
                    <div class="card bg-warning-50">
                        <div class="card-body">
                            <h6>Job Menunggu Dijahit</h6>
                            <h4 class="mt-2">{{ $jobMenunggu }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 xl:col-span-3 md:col-span-6">
                    <div class="card bg-primary-50">
                        <div class="card-body">
                            <h6>Target Jahit Hari Ini</h6>
                            <h4 class="mt-2">{{ $targetHariIni }} pcs</h4>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 xl:col-span-3 md:col-span-6">
                    <div class="card bg-success-50">
                        <div class="card-body">
                            <h6>Selesai Hari Ini</h6>
                            <h4 class="mt-2">{{ $selesaiHariIni }} pcs</h4>
                        </div>
                    </div>
                </div>

                {{-- JOB AKTIF --}}
                <div class="col-span-12 xl:col-span-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Job Siap Dijahit</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Model</th>
                                        <th>Target</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($jobAktif as $job)
                                        <tr>
                                            <td>{{ $job->modelPakaian->nama_model }}</td>
                                            <td>{{ $job->jumlah_target }}</td>
                                            <td>
                                                <a href="{{ route('penjahit.job-jahit.index') }}"
                                                    class="btn btn-sm btn-primary">
                                                    Kerjakan
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">
                                                Tidak ada job
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- RIWAYAT --}}
                <div class="col-span-12 xl:col-span-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Riwayat Jahit Hari Ini</h5>
                        </div>
                        <div class="card-body">
                            <ul class="space-y-3">
                                @forelse($riwayatHariIni as $job)
                                    <li>
                                        <strong>{{ $job->modelPakaian->nama_model }}</strong><br>
                                        <small>{{ $job->jumlah_target }} pcs</small>
                                    </li>
                                @empty
                                    <li class="text-muted">Belum ada</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
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
