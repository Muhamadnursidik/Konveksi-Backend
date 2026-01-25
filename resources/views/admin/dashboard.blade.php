<!doctype html>
<html lang="id">
<head>
    @include('layouts/admin/head-page-meta', ['title' => 'Dashboard Admin'])
    @include('layouts/admin/head-css')
</head>

<body>
@include('layouts/admin/sidebar')
@include('layouts/admin/navbar')

<div class="pc-container">
<div class="pc-content">

@include('layouts/admin/breadcrumb', [
    'breadcrumb-item' => 'Dashboard',
    'Dashboard Admin' => 'Overview'
])

{{-- ===== SUMMARY CARD ===== --}}
<div class="grid grid-cols-12 gap-x-6 mb-6">

    {{-- TOTAL JOB --}}
    <div class="col-span-12 md:col-span-6 xl:col-span-3">
        <div class="card bg-theme-bg-1 text-black">
            <div class="card-body flex items-center justify-between">
                <div>
                    <p class="mb-1 text-black/70">Total Job Produksi</p>
                    <h3 class="mb-0">{{ $totalJob }}</h3>
                </div>
                <i class="feather icon-layers text-[40px] opacity-70"></i>
            </div>
        </div>
    </div>

    {{-- JOB AKTIF --}}
    <div class="col-span-12 md:col-span-6 xl:col-span-3">
        <div class="card bg-warning-500 text-black">
            <div class="card-body flex items-center justify-between">
                <div>
                    <p class="mb-1 text-black/70">Job Aktif</p>
                    <h3 class="mb-0">{{ $jobAktif }}</h3>
                </div>
                <i class="feather icon-refresh-cw text-[40px] opacity-70"></i>
            </div>
        </div>
    </div>

    {{-- JOB SELESAI --}}
    <div class="col-span-12 md:col-span-6 xl:col-span-3">
        <div class="card bg-success-500 text-black">
            <div class="card-body flex items-center justify-between">
                <div>
                    <p class="mb-1 text-black/70">Job Selesai</p>
                    <h3 class="mb-0">{{ $jobSelesai }}</h3>
                </div>
                <i class="feather icon-check-circle text-[40px] opacity-70"></i>
            </div>
        </div>
    </div>

    {{-- TOTAL TARGET --}}
    <div class="col-span-12 md:col-span-6 xl:col-span-3">
        <div class="card bg-primary-500 text-black">
            <div class="card-body flex items-center justify-between">
                <div>
                    <p class="mb-1 text-black/70">Target Produksi</p>
                    <h3 class="mb-0">{{ number_format($totalTarget) }}</h3>
                </div>
                <i class="feather icon-package text-[40px] opacity-70"></i>
            </div>
        </div>
    </div>

</div>

{{-- ===== TABEL MONITORING PRODUKSI ===== --}}
<div class="grid grid-cols-12 gap-x-6 mb-6">
    <div class="col-span-12">
        <div class="card table-card">
            <div class="card-header">
                <h5>Monitoring Produksi</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Model</th>
                                <th>Target</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($jobTerbaru as $job)
                            <tr>
                                <td>{{ $job->modelPakaian->nama_model }}</td>
                                <td>{{ $job->jumlah_target }}</td>
                                <td>
                                    <span class="pc-badge
                                        @if($job->status=='menunggu') pc-badge-secondary
                                        @elseif($job->status=='dipotong') pc-badge-info
                                        @elseif($job->status=='dijahit') pc-badge-warning
                                        @elseif($job->status=='finishing') pc-badge-primary
                                        @else pc-badge-success @endif
                                    ">
                                        {{ ucfirst($job->status) }}
                                    </span>
                                </td>
                                <td>{{ $job->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>

@include('layouts/admin/footer-block')
@include('layouts/admin/footer-js')
</body>
</html>
