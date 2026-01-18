<!doctype html>
<html lang="en">
<!-- [Head] start -->
<head>
    @include('layouts/finishing/head-page-meta', ['title' => 'Dashboard Finishing'])
    @include('layouts/finishing/head-css')
</head>
<!-- [Head] end -->

<body>
    @include('layouts/finishing/sidebar')
    @include('layouts/finishing/navbar')

    <div class="pc-container">
        <div class="pc-content">

            @include('layouts/finishing/breadcrumb', [
                'breadcrumb-item' => 'Dashboard',
                'Dashboard Finishing' => 'Default',
            ])

            <!-- GRID UTAMA -->
            <div class="grid grid-cols-12 gap-6">

                {{-- CARD RINGKASAN --}}
                <div class="col-span-12 xl:col-span-4 md:col-span-6">
                    <div class="card bg-warning-50">
                        <div class="card-body">
                            <h6>Job Siap Finishing</h6>
                            <h4 class="mt-2">{{ $siapFinishing }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 xl:col-span-4 md:col-span-6">
                    <div class="card bg-success-50">
                        <div class="card-body">
                            <h6>Selesai Hari Ini</h6>
                            <h4 class="mt-2">{{ $selesaiHariIni }} pcs</h4>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 xl:col-span-4 md:col-span-6">
                    <div class="card bg-primary-50">
                        <div class="card-body">
                            <h6>Total Packing Hari Ini</h6>
                            <h4 class="mt-2">{{ $totalPackingHariIni }} pcs</h4>
                        </div>
                    </div>
                </div>

                {{-- JOB AKTIF FINISHING --}}
                <div class="col-span-12 xl:col-span-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Job Menunggu Finishing</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Model</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jobTerbaru as $job)
                                        <tr>
                                            <td>
                                                <strong>{{ $job->modelPakaian->nama_model }}</strong><br>
                                                <small class="text-muted">
                                                    {{ $job->modelPakaian->kategori }}
                                                </small>
                                            </td>
                                            <td>{{ $job->jumlah_target }} pcs</td>
                                            <td>
                                                <span class="badge bg-warning">
                                                    Siap Finishing
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">
                                                Tidak ada job finishing
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END GRID -->

        </div>
    </div>

    @include('layouts/finishing/footer-block')
    @include('layouts/finishing/footer-js')
</body>
</html>
