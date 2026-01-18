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
                    <select name="status" class="form-select" required>
                        @foreach (['menunggu', 'dipotong', 'dijahit', 'finishing', 'selesai'] as $s)
                            <option value="{{ $s }}" @selected($jobProduksi->status == $s)>
                                {{ ucfirst($s) }}
                            </option>
                        @endforeach
                    </select>
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
    <!-- [ Main Content ] end -->
    @include('layouts/admin/footer-block')
    @include('layouts/admin/footer-js')
</body>
<!-- [Body] end -->

</html>
