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
                        <li class="breadcrumb-item"><a href="{{ route('admin.finishing.index') }}">Daftar Finishing</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Edit</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="col-span-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Akun Finishing</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.finishing.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $users->name) }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $users->email) }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">
                                        Password
                                        <small class="text-muted">(kosongkan jika tidak diubah)</small>
                                    </label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" {{ $users->is_active ? 'selected' : '' }}>
                                            Aktif
                                        </option>
                                        <option value="0" {{ !$users->is_active ? 'selected' : '' }}>
                                            Nonaktif
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <label>Foto</label>
                                    <input name="photo" type="file" class="form-control">
                                    <img src="{{ asset('storage/' . $users->photo) }}" width="100" class="mt-2 rounded-circle"
                                        alt="{{ $users->name }}">
                                </div>
                            </div>

                            <div class="mt-4 flex gap-2">
                                <button class="btn btn-primary">
                                    Update
                                </button>

                                <a href="{{ route('admin.finishing.index') }}" class="btn btn-secondary">
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
