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
                        <h5>Tambah Bahan Baku</h5>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.bahan-baku.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Nama Bahan</label>
                                <input type="text" name="nama_bahan" class="form-control"
                                    value="{{ old('nama_bahan') }}" placeholder="Nama Bahan" required>
                                @error('nama_bahan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Warna</label>
                                <input type="text" name="warna" class="form-control" value="{{ old('warna') }}"
                                    placeholder="Warna" required>
                                @error('warna')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Stok (Meter)</label>
                                <input type="number" step="0.01" name="stok_meter" class="form-control"
                                    value="{{ old('stok_meter') }}" placeholder="Stok dalam meter" required>
                                @error('stok_meter')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                            </div>

                            <div class="flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>

                                <a href="{{ route('admin.bahan-baku.index') }}" class="btn btn-light">
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
