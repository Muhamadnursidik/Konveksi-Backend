<!doctype html>
<html lang="en">
<head>
    @include('layouts/pemotong/head-page-meta', ['title' => 'Job Pemotongan'])
    @include('layouts/pemotong/head-css')
</head>

<body>
@include('layouts/pemotong/sidebar')
@include('layouts/pemotong/navbar')

<div class="pc-container">
    <div class="pc-content">

        <!-- breadcrumb -->
        <div class="page-header mb-3">
            <div class="page-block">
                <div class="page-header-title">
                    <h5 class="mb-0 font-medium">Job Pemotongan</h5>
                </div>
            </div>
        </div>

        <div class="card table-card">
            <div class="card-header">
                <h5>Job Menunggu Dipotong</h5>
            </div>

            <div class="card-body">
                <x-alert />

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Model</th>
                                <th>Bahan Baku</th>
                                <th>Target</th>
                                <th>Status</th>
                                <th>Upload Bukti</th>
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
                                        Menunggu
                                    </span>
                                </td>

                                {{-- FORM UPLOAD --}}
                                <td style="width:220px">
                                    <form method="POST"
                                          action="{{ route('pemotong.job-potong.selesai', $job->id) }}"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <input type="file"
                                               name="foto_bukti"
                                               class="form-control form-control-sm"
                                               accept="image/*"
                                               required>
                                </td>

                                <td>
                                        <button class="btn btn-success btn-sm"
                                                onclick="return confirm('Yakin pekerjaan sudah selesai?')">
                                            Kirim Bukti
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Tidak ada job menunggu pemotongan
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

@include('layouts/pemotong/footer-block')
@include('layouts/pemotong/footer-js')
</body>
</html>
