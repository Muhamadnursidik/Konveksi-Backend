<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    @include('layouts/penjahit/head-page-meta', ['title' => 'Home'])
    @include('layouts/penjahit/head-css')
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    @include('layouts/penjahit/sidebar')
    @include('layouts/penjahit/navbar')

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
                        <li class="breadcrumb-item"><a href="{{ route('penjahit.data-model-pakaian.index') }}">Data Model Pakaian</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Index</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="col-span-12">
                <div class="card table-card">
                    <div class="card-header flex justify-between items-center">
                        <h5>Model Pakaian</h5>
                    </div>

                    <div class="card-body">
                        <x-alert />

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Ukuran</th>
                                        <th>Warna</th>
                                        <th>Kebutuhan (m)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($data as $row)
                                        <tr>
                                            <td>{{ $row->nama_model }}</td>
                                            <td>{{ $row->kategori }}</td>
                                            <td>{{ $row->ukuran }}</td>
                                            <td>{{ $row->warna }}</td>
                                            <td>{{ $row->kebutuhan_bahan }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">
                                                Data model pakaian kosong
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
    @include('layouts/penjahit/footer-block')
    @include('layouts/penjahit/footer-js')
</body>
<!-- [Body] end -->

</html>
