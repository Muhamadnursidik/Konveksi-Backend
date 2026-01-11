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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Create</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="col-span-12 xl:col-span-6 md:col-span-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Model Pakaian</h5>
                    </div>

                    <div class="card-body">
                        <x-alert />

                        <form method="POST" action="{{ route('admin.model-pakaian.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Nama Model</label>
                                <input type="text" name="nama_model" class="form-control"
                                    value="{{ old('nama_model') }}" placeholder="Nama Model" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" name="kategori" class="form-control" value="{{ old('kategori') }}"
                                    placeholder="Baju / Jaket" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ukuran</label>
                                <select name="ukuran" class="form-control" required>
                                    <option value="">Pilih Ukuran</option>
                                    <option value="S" {{ old('ukuran') == 'S' ? 'selected' : '' }}>S</option>
                                    <option value="M" {{ old('ukuran') == 'M' ? 'selected' : '' }}>M</option>
                                    <option value="L" {{ old('ukuran') == 'L' ? 'selected' : '' }}>L</option>
                                    <option value="XL" {{ old('ukuran') == 'XL' ? 'selected' : '' }}>XL</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Warna</label>
                                <input type="text" name="warna" class="form-control" value="{{ old('warna') }}"
                                    placeholder="Warna" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kebutuhan Bahan (Meter)</label>
                                <input type="text" name="kebutuhan_bahan" class="form-control"
                                    value="{{ old('kebutuhan_bahan') }}" placeholder="Contoh: 1.25" required>
                            </div>

                            <div class="flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>

                                <a href="{{ route('admin.model-pakaian.index') }}" class="btn btn-light">
                                    Kembali
                                </a>
                            </div>
                        </form>
                    </div>
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
