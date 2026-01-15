<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    @include('layouts/pemotong/head-page-meta', ['title' => 'Home'])
    @include('layouts/pemotong/head-css')
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    @include('layouts/pemotong/sidebar')
    @include('layouts/pemotong/navbar')

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
                        <li class="breadcrumb-item"><a href="{{ route('pemotong.data-bahan-baku.index') }}">Data Bahan Baku</a></li>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $row)
                                        <tr>
                                            <td>{{ $row->nama_bahan }}</td>
                                            <td>{{ $row->warna }}</td>
                                            <td>{{ $row->stok_meter }}</td>
                                            <td>{{ $row->keterangan ?? '-' }}</td>
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
    @include('layouts/pemotong/footer-block')
    @include('layouts/pemotong/footer-js')
</body>
<!-- [Body] end -->

</html>
