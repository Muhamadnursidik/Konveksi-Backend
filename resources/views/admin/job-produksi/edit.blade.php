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
                        <li class="breadcrumb-item"><a href="{{ route('admin.bahan-baku.index') }}">Bahan Baku</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Edit</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <div class="card">
                <div class="card-header">
                    <h5>Edit Job Produksi</h5>
                </div>

                <div class="card-body">
                    <x-alert />
                    <form method="POST" action="{{ route('admin.job-produksi.update', $jobProduksi->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Model Pakaian</label>
                            <select name="model_pakaian_id" class="form-select" required>
                                @foreach ($modelPakaian as $m)
                                    <option value="{{ $m->id }}" @selected($jobProduksi->model_pakaian_id == $m->id)>
                                        {{ $m->nama_model }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bahan Baku</label>
                            <select name="bahan_baku_id" class="form-select" required>
                                @foreach ($bahanBaku as $b)
                                    <option value="{{ $b->id }}" @selected($jobProduksi->bahan_baku_id == $b->id)>
                                        {{ $b->nama_bahan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Target Produksi</label>
                            <input type="number" name="jumlah_target" class="form-control"
                                value="{{ $jobProduksi->jumlah_target }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Produksi</label>
                            <input type="hidden" name="status" value="menunggu">
                            <input type="text" class="form-control" value="Menunggu" disabled>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.job-produksi.index') }}" class="btn btn-secondary me-2">
                                Kembali
                            </a>
                            <button class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- [ Main Content ] end -->
    @include('layouts/admin/footer-block')
    @include('layouts/admin/footer-js')
</body>
<!-- [Body] end -->

</html>
