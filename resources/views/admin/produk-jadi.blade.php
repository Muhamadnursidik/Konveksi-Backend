<!doctype html>
<html lang="id">

<head>
    @include('layouts/admin/head-page-meta', ['title' => 'Dashboard Admin'])
    @include('layouts/admin/head-css')
</head>

<body>
    @include('layouts/admin/sidebar')
    @include('layouts/admin/navbar')

    <div class="pc-container">
        <div class="pc-content">

            @include('layouts/admin/breadcrumb', [
                'breadcrumb-item' => 'Dashboard',
                'Dashboard Admin' => 'Overview',
            ])

            {{-- Main Content --}}
            <div class="grid grid-cols-12 gap-6">

                <!-- HEADER -->
                <div class="col-span-12">
                    <div class="card">
                        <div class="card-body flex justify-between items-center">
                            <div>
                                <h4 class="mb-1">Produk Jadi</h4>
                                <p class="text-muted text-sm">
                                    Daftar hasil produksi yang telah selesai
                                </p>
                            </div>
                            <span class="badge bg-success">
                                Total: {{ $data->count() }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="col-span-12">
                    <div class="card table-card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Model Pakaian</th>
                                            <th>Bahan</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $item)
                                            <tr>
                                                <td>
                                                    <strong>
                                                        {{ $item->jobProduksi->modelPakaian->nama_model }}
                                                    </strong>
                                                    <br>
                                                    <small class="text-muted">
                                                        {{ $item->jobProduksi->modelPakaian->kategori }} |
                                                        {{ $item->jobProduksi->modelPakaian->ukuran }}
                                                    </small>
                                                </td>

                                                <td>
                                                    {{ $item->jobProduksi->bahanBaku->nama_bahan }}
                                                    <br>
                                                    <small class="text-muted">
                                                        {{ $item->jobProduksi->bahanBaku->warna }}
                                                    </small>
                                                </td>

                                                <td>
                                                    {{ $item->jobProduksi->jumlah_target }}
                                                </td>

                                                <td>
                                                    {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}
                                                </td>

                                                <td>
                                                    <span class="badge bg-success">
                                                        Selesai
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted py-6">
                                                    Belum ada produk jadi
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

        </div>
    </div>

    @include('layouts/admin/footer-block')
    @include('layouts/admin/footer-js')
</body>

</html>
