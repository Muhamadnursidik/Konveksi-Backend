<!doctype html>
<html lang="en">
<head>
    @include('layouts/penjahit/head-page-meta', ['title' => 'Job Jahit'])
    @include('layouts/penjahit/head-css')
</head>

<body>
@include('layouts/penjahit/sidebar')
@include('layouts/penjahit/navbar')

<div class="pc-container">
    <div class="pc-content">

        <!-- breadcrumb -->
        <div class="page-header mb-3">
            <div class="page-block">
                <div class="page-header-title">
                    <h5 class="mb-0 font-medium">Job Jahit</h5>
                </div>
            </div>
        </div>

        <div class="card table-card">
            <div class="card-header">
                <h5>Job Menunggu Dijahit</h5>
            </div>

            <div class="card-body">
                <x-alert />

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                        <tr>
                            <th>Model</th>
                            <th>Target</th>
                            <th>Pemotong</th>
                            <th>Status</th>
                            <th>Upload Bukti</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($jobs as $job)
                            <tr>
                                <td>{{ $job->modelPakaian->nama_model }}</td>
                                <td>{{ $job->jumlah_target }}</td>

                                <td>
                                    {{ $job->pemotongan->pemotong->name ?? '-' }}
                                </td>

                                <td>
                                    <span class="pc-badge pc-badge-warning">
                                        Menunggu Jahit
                                    </span>
                                </td>

                                {{-- FORM UPLOAD --}}
                                <td style="width:220px">
                                    <form method="POST"
                                          action="{{ route('penjahit.job-jahit.selesai', $job->id) }}"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <input type="file"
                                               name="bukti_jahit"
                                               class="form-control form-control-sm"
                                               accept="image/*"
                                               required>
                                </td>

                                <td>
                                        <button class="btn btn-success btn-sm"
                                                onclick="return confirm('Yakin jahitan sudah selesai?')">
                                            Kirim Bukti
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"
                                    class="text-center text-muted">
                                    Tidak ada job jahit
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

@include('layouts/penjahit/footer-block')
@include('layouts/penjahit/footer-js')
</body>
</html>
