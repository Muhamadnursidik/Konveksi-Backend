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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Index</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Produksi</h5>
                    <a href="{{ route('admin.job-produksi.create') }}" class="btn btn-primary">
                        Tambah Produksi
                    </a>
                </div>

                <div class="card-body">
                    <x-alert />
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Model Pakaian</th>
                                    <th>Target Produksi (jumlah)</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->modelPakaian->nama_model }}</td>
                                        <td>{{ $item->jumlah_target }}</td>
                                        <td>
                                            <span
                                                class="badge
                                @if ($item->status == 'proses') bg-warning
                                @elseif($item->status == 'selesai') bg-success
                                @else bg-secondary @endif">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.job-produksi.destroy', $item->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                            <a href="{{ route('admin.job-produksi.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm">
                                                Edit
                                            </a>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Hapus data produksi?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
