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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Index</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="col-span-12 xl:col-span-8 md:col-span-6">
                <div class="card table-card">
                    <div class="card-header flex justify-between items-center">
                        <h5>Data Bahan Baku</h5>
                        
                        <a href="{{ route('admin.bahan-baku.create') }}" class="btn btn-primary btn-sm">
                            Tambah
                        </a>
                    </div>
                    
                    <div class="card-body">
                        <x-alert />
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Warna</th>
                                        <th>Stok (Meter)</th>
                                        <th>Keterangan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $row)
                                        <tr>
                                            <td>{{ $row->nama_bahan }}</td>
                                            <td>{{ $row->warna }}</td>
                                            <td>{{ $row->stok_meter }}</td>
                                            <td>{{ $row->keterangan ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('admin.bahan-baku.edit', $row->id) }}"class="btn btn-sm bg-theme-bg-1 text-white">
                                                    Edit
                                                </a>

                                                <form method="POST"
                                                    action="{{ route('admin.bahan-baku.destroy', $row->id) }}"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Yakin mau hapus?')" class="btn btn-sm bg-danger text-white">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                Data kosong
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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
