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
                        <li class="breadcrumb-item"><a href="{{ route('admin.finishing.index') }}">Daftar Finishing</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Index</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="col-span-12">
                <div class="card table-card">
                    <div class="card-header flex justify-between items-center">
                        <h5>Data Akun Finishing</h5>

                        <a href="{{ route('admin.finishing.create') }}" class="btn btn-primary btn-sm">
                            Tambah
                        </a>
                    </div>

                    <div class="card-body">
                        <x-alert />

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>foto</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($users as $row)
                                        <tr>
                                            <td>
                                                @if ($row->photo)
                                                    <img src="{{ asset('storage/' . $row->photo) }}" width="40" class="rounded-circle" alt="{{ $row->name }}">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>
                                                @if ($row->is_active)
                                                    <span class="badge btn-success">Aktif</span>
                                                @else
                                                    <span class="badge btn-danger">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.finishing.edit', $row->id) }}"
                                                    class="btn btn-sm bg-theme-bg-1 text-white">
                                                    Edit
                                                </a>

                                                <form method="POST"
                                                    action="{{ route('admin.finishing.destroy', $row->id) }}"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button onclick="return confirm('Yakin mau hapus akun ini?')"
                                                        class="btn btn-sm btn-danger text-white border-0">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                Data akun finishing masih kosong
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
