<!doctype html>
<html lang="en">

<head>
    @include('layouts/admin/head-page-meta', ['title' => 'Job Produksi'])
    @include('layouts/admin/head-css')
</head>

<body>
    @include('layouts/admin/sidebar')
    @include('layouts/admin/navbar')

    <div class="pc-container">
        <div class="pc-content">

            <div class="page-header mb-4">
                <h5 class="mb-0">Job Produksi</h5>
            </div>

            <div class="card table-card">
                <div class="card-header flex justify-between items-center">
                    <h5 class="mb-0">Data Produksi</h5>
                    <a href="{{ route('admin.job-produksi.create') }}" class="btn btn-primary btn-sm">
                        Tambah Produksi
                    </a>
                </div>

                <div class="card-body">
                    <x-alert />

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead>
                                <tr class="text-center">
                                    <th>Model</th>
                                    <th>Bahan</th>
                                    <th>Target</th>
                                    <th>Status</th>

                                    <th>Pemotong</th>
                                    <th>Bukti Potong</th>

                                    <th>Penjahit</th>
                                    <th>Bukti Jahit</th>

                                    <th>Finishing</th>
                                    <th>Bukti Finishing</th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        {{-- MODEL --}}
                                        <td>{{ $item->modelPakaian->nama_model }}</td>

                                        {{-- BAHAN --}}
                                        <td>{{ $item->bahanBaku->nama_bahan }}</td>

                                        {{-- TARGET --}}
                                        <td class="text-center">{{ $item->jumlah_target }}</td>

                                        {{-- STATUS --}}
                                        <td class="text-center">
                                            <span
                                                class="pc-badge
                                        @if ($item->status == 'menunggu') pc-badge-secondary
                                        @elseif($item->status == 'dipotong') pc-badge-warning
                                        @elseif($item->status == 'dijahit') pc-badge-info
                                        @elseif($item->status == 'finishing') pc-badge-primary
                                        @elseif($item->status == 'selesai') pc-badge-success @endif">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>

                                        {{-- PEMOTONG --}}
                                        <td class="text-center">
                                            {{ optional($item->pemotongan?->pemotong)->name ?? '-' }}
                                        </td>

                                        {{-- BUKTI POTONG --}}
                                        <td class="text-center">
                                            @if ($item->pemotongan?->foto_bukti)
                                                <button class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#fotoModal"
                                                    data-foto="{{ asset('storage/' . $item->pemotongan->foto_bukti) }}">
                                                    Lihat
                                                </button>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>

                                        {{-- PENJAHIT --}}
                                        <td class="text-center">
                                            {{ optional($item->penjahitan?->penjahit)->name ?? '-' }}
                                        </td>

                                        {{-- BUKTI JAHIT --}}
                                        <td class="text-center">
                                            @if ($item->penjahitan?->foto_bukti)
                                                <a href="{{ asset('storage/' . $item->penjahitan->foto_bukti) }}"
                                                    target="_blank" class="btn btn-sm btn-secondary">
                                                    Lihat
                                                </a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>

                                        {{-- FINISHING --}}
                                        <td class="text-center">
                                            {{ optional($item->finishing?->finishing)->name ?? '-' }}
                                        </td>

                                        {{-- BUKTI FINISHING --}}
                                        <td class="text-center">
                                            @if ($item->finishing?->foto_bukti)
                                                <a href="{{ asset('storage/' . $item->finishing->foto_bukti) }}"
                                                    target="_blank" class="btn btn-sm btn-secondary">
                                                    Lihat
                                                </a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>

                                        {{-- AKSI / ACC --}}
                                        <td class="text-center">

                                            {{-- ACC POTONG --}}
                                            @if ($item->status === 'menunggu' && $item->pemotongan && $item->pemotongan->status === 'pending')
                                                <form
                                                    action="{{ route('admin.job-produksi.acc-pemotongan', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm">
                                                        ACC Potong
                                                    </button>
                                                </form>

                                            @elseif ($item->status == 'menunggu')
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

                                                {{-- ACC JAHIT --}}
                                            @elseif ($item->status === 'dipotong' && $item->penjahitan && $item->penjahitan->status === 'pending')
                                                <form
                                                    action="{{ route('admin.job-produksi.acc-penjahitan', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm">
                                                        ACC Jahit
                                                    </button>
                                                </form>

                                                {{-- ACC FINISHING --}}
                                            @elseif ($item->status === 'dijahit' && $item->finishing && $item->finishing->status === 'pending')
                                                <form
                                                    action="{{ route('admin.job-produksi.acc-finishing', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm">
                                                        ACC Finishing
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

{{-- MODAL FOTO BUKTI POTONG --}}
@foreach ($data as $item)
    @if ($item->pemotongan?->foto_bukti)
        <div class="modal fade" id="fotoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Foto Bukti Pemotongan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>

                    <div class="modal-body text-center">
                        <img id="fotoModalImg" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach

@include('layouts/admin/footer-block')
@include('layouts/admin/footer-js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const modal = document.getElementById('fotoModal')
    modal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget
        const foto = button.getAttribute('data-foto')
        document.getElementById('fotoModalImg').src = foto
    })
</script>

</html>
