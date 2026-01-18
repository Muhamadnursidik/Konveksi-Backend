<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    @include('layouts/admin/head-page-meta', ['title' => 'Home'])
    @include('layouts/admin/head-css')
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    @include('layouts/admin/sidebar')
    @include('layouts/admin/navbar')

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
                        <li class="breadcrumb-item"><a href="{{ route('admin.job-produksi.index') }}">Job Produksi</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Create</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Job Produksi</h5>
                </div>
                
                <div class="card-body">
                    <x-alert />
                    <form method="POST" action="{{ route('admin.job-produksi.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Model Pakaian</label>
                            <select name="model_pakaian_id" class="form-select" required>
                                <option value="">-- Pilih Model --</option>
                                @foreach ($modelPakaian as $m)
                                    <option value="{{ $m->id }}">
                                        {{ $m->nama_model }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bahan Baku</label>
                            <select name="bahan_baku_id" class="form-select" required>
                                <option value="">-- Pilih Bahan Baku --</option>
                                @foreach ($bahanBaku as $b)
                                    <option value="{{ $b->id }}">
                                        {{ $b->nama_bahan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Target Produksi</label>
                            <input type="number" name="jumlah_target" class="form-control" placeholder="Jumlah target"
                                required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.job-produksi.index') }}" class="btn btn-secondary me-2">
                                Kembali
                            </a>
                            <button class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    @include('layouts/admin/footer-block')
    @include('layouts/admin/footer-js')
</body>
<!-- [Body] end -->

</html>
