<!doctype html>
<html lang="en">

<head>
    @include('layouts/finishing/head-page-meta', ['title' => 'Job Finishing'])
    @include('layouts/finishing/head-css')
</head>

<body>
    @include('layouts/finishing/sidebar')
    @include('layouts/finishing/navbar')

    <div class="pc-container">
        <div class="pc-content">

            {{-- BREADCRUMB --}}
            <div class="page-header">
                <div class="page-block">
                    <div class="page-header-title">
                        <h5 class="mb-0 font-medium">Job Finishing & Packing</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('finishing.job-finishing.index') }}">Finishing</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Daftar Job Siap Finishing</h5>
                </div>

                <x-alert />

                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Model</th>
                                <th>Target</th>
                                <th>Pemotong</th>
                                <th>Penjahit</th>
                                <th>Status</th>
                                <th>Bukti Foto</th>
                                <th width="160">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($jobs as $job)
                                <tr>
                                    {{-- MODEL --}}
                                    <td>
                                        <strong>{{ $job->modelPakaian->nama_model }}</strong><br>
                                    </td>

                                    {{-- JUMLAH --}}
                                    <td>{{ $job->jumlah_target }}</td>

                                    {{-- PEMOTONG --}}
                                    <td>
                                        {{ $job->penjahitan->pemotong->name ?? '-' }}
                                    </td>

                                    {{-- PENJAHIT --}}
                                    <td>
                                        {{ $job->penjahitan->penjahit->name ?? '-' }}
                                    </td>

                                    {{-- STATUS --}}
                                    <td>
                                        <span class="pc-badge pc-badge-info">
                                            Siap Finishing
                                        </span>
                                    </td>

                                {{-- FORM UPLOAD --}}
                                <td style="width:220px">
                                    <form method="POST"
                                          action="{{ route('finishing.job-finishing.selesai', $job->id) }}"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <input type="file"
                                               name="foto_bukti"
                                               class="form-control form-control-sm"
                                               accept="image/*"
                                               required>
                                </td>

                                    {{-- AKSI --}}
                                    <td>
                                        <form method="POST"
                                            action="{{ route('finishing.job-finishing.selesai', $job->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <button class="btn btn-primary btn-sm w-100">
                                                Selesai & Kirim
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
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

    @include('layouts/finishing/footer-block')
    @include('layouts/finishing/footer-js')
</body>

</html>
