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
            @include('layouts/pemotong/breadcrumb', [
                'breadcrumb-item' => 'Dashboard',
                'Dashboard Pemotong' => 'Default',
            ])
            <!-- [ Main Content ] start -->
            <div class="grid grid-cols-12 gap-x-6">

                {{-- CARD 1: JOB AKTIF --}}
                <div class="col-span-12 xl:col-span-3 md:col-span-6">
                    <div class="card">
                        <div class="card-header !pb-0 !border-b-0">
                            <h5>Job Aktif</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="font-light mb-0">{{ $jobAktif }}</h3>
                            <p class="text-muted mt-2">Menunggu & proses potong</p>
                        </div>
                    </div>
                </div>

                {{-- CARD 2: SELESAI HARI INI --}}
                <div class="col-span-12 xl:col-span-3 md:col-span-6">
                    <div class="card">
                        <div class="card-header !pb-0 !border-b-0">
                            <h5>Selesai Hari Ini</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="font-light mb-0">{{ $jobSelesaiHariIni }}</h3>
                            <p class="text-muted mt-2">Job selesai hari ini</p>
                        </div>
                    </div>
                </div>

                {{-- CARD 3: TOTAL TARGET --}}
                <div class="col-span-12 xl:col-span-3 md:col-span-6">
                    <div class="card">
                        <div class="card-header !pb-0 !border-b-0">
                            <h5>Total Target</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="font-light mb-0">{{ $totalTarget }}</h3>
                            <p class="text-muted mt-2">Target potong aktif</p>
                        </div>
                    </div>
                </div>

                {{-- CARD 4: HASIL HARI INI --}}
                <div class="col-span-12 xl:col-span-3 md:col-span-6">
                    <div class="card">
                        <div class="card-header !pb-0 !border-b-0">
                            <h5>Hasil Hari Ini</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="font-light mb-0">{{ $totalHasilHariIni }}</h3>
                            <p class="text-muted mt-2">Berhasil dipotong</p>
                        </div>
                    </div>
                </div>

                {{-- TABLE JOB POTONG --}}
                <div class="col-span-12 xl:col-span-12 md:col-span-12">
                    <div class="col-span-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h5>Job Potong Aktif</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Model</th>
                                                <th>Target</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($jobHariIni as $job)
                                                <tr>
                                                    <td>{{ $job->modelPakaian->nama_model }}</td>
                                                    <td>{{ $job->jumlah_target }}</td>
                                                    <td>
                                                        <span class="badge bg-warning">
                                                            {{ ucfirst($job->status) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-center"><a href="{{ route('pemotong.job-potong.index') }}">kerjakan</a></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">
                                                        Tidak ada job potong
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
