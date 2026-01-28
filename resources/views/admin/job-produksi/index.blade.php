@include('layouts.admin.head-page')

<body>
    <!--! [Start] Navigation Manu !-->
    @include('layouts.admin.sidebar')
    <!--! [End]  Navigation Manu !-->

    <!--! [Start] Header !-->
    @include('layouts.admin.navbar')
    <!--! [End] Header !-->
    <!--! [Start] Main Content !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                    </ul>
                </div>
            </div>
            <!-- [ page-header ] end -->

            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">

                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Data Produksi</h5>
                                <a href="{{ route('admin.job-produksi.create') }}" class="btn btn-primary btn-sm">
                                    Tambah Produksi
                                </a>
                            </div>

                            <div class="card-body p-0">
                                <x-alert />

                                <div class="table-responsive">
                                    <table id="datatable-model" class="table table-hover align-middle"
                                        id="jobProduksiTable">
                                        <thead>
                                            <tr>
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
                                                <th class="text-end">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr class="single-item">

                                                    {{-- MODEL --}}
                                                    <td>
                                                        <div class="fw-semibold">{{ $item->modelPakaian->nama_model }}
                                                        </div>
                                                    </td>

                                                    {{-- BAHAN --}}
                                                    <td>{{ $item->bahanBaku->nama_bahan }}</td>

                                                    {{-- TARGET --}}
                                                    <td class="text-center fw-bold">{{ $item->jumlah_target }}</td>

                                                    {{-- STATUS --}}
                                                    <td>
                                                        @php
                                                            $statusMap = [
                                                                'menunggu' => [
                                                                    'class' => 'badge bg-soft-secondary text-secondary',
                                                                    'label' => 'Menunggu',
                                                                ],
                                                                'dipotong' => [
                                                                    'class' => 'badge bg-soft-warning text-warning',
                                                                    'label' => 'Dipotong',
                                                                ],
                                                                'dijahit' => [
                                                                    'class' => 'badge bg-soft-info text-info',
                                                                    'label' => 'Dijahit',
                                                                ],
                                                                'finishing' => [
                                                                    'class' => 'badge bg-soft-primary text-primary',
                                                                    'label' => 'Finishing',
                                                                ],
                                                                'selesai' => [
                                                                    'class' => 'badge bg-soft-success text-success',
                                                                    'label' => 'Selesai',
                                                                ],
                                                            ];
                                                            $status = $statusMap[$item->status] ?? null;
                                                        @endphp

                                                        @if ($status)
                                                            <span class="badge {{ $status['class'] }}">
                                                                {{ $status['label'] }}
                                                            </span>
                                                        @else
                                                            <span class="badge bg-soft-dark text-dark">-</span>
                                                        @endif
                                                    </td>


                                                    {{-- PEMOTONG --}}
                                                    <td>{{ optional($item->pemotongan?->pemotong)->name ?? '-' }}</td>

                                                    {{-- BUKTI POTONG --}}
                                                    <td>
                                                        @if ($item->pemotongan?->foto_bukti)
                                                            <a href="{{ asset('storage/' . $item->pemotongan->foto_bukti) }}"
                                                                target="_blank" class="btn btn-sm btn-light">
                                                                Lihat
                                                            </a>
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>

                                                    {{-- PENJAHIT --}}
                                                    <td>{{ optional($item->penjahitan?->penjahit)->name ?? '-' }}</td>

                                                    {{-- BUKTI JAHIT --}}
                                                    <td>
                                                        @if ($item->penjahitan?->foto_bukti)
                                                            <a href="{{ asset('storage/' . $item->penjahitan->foto_bukti) }}"
                                                                target="_blank" class="btn btn-sm btn-light">
                                                                Lihat
                                                            </a>
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>

                                                    {{-- FINISHING --}}
                                                    <td>{{ optional($item->finishing?->finishing)->name ?? '-' }}</td>

                                                    {{-- BUKTI FINISHING --}}
                                                    <td>
                                                        @if ($item->finishing?->foto_bukti)
                                                            <a href="{{ asset('storage/' . $item->finishing->foto_bukti) }}"
                                                                target="_blank" class="btn btn-sm btn-light">
                                                                Lihat
                                                            </a>
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>

                                                    {{-- AKSI --}}
                                                    <td class="text-end">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            @if ($item->status === 'menunggu' && $item->pemotongan?->status === 'pending')
                                                                <form
                                                                    action="{{ route('admin.job-produksi.acc-pemotongan', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-success btn-sm">ACC
                                                                        Potong</button>
                                                                </form>
                                                            @elseif ($item->status === 'dipotong' && $item->penjahitan?->status === 'pending')
                                                                <form
                                                                    action="{{ route('admin.job-produksi.acc-penjahitan', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-success btn-sm">ACC
                                                                        Jahit</button>
                                                                </form>
                                                            @elseif ($item->status === 'dijahit' && $item->finishing?->status === 'pending')
                                                                <form
                                                                    action="{{ route('admin.job-produksi.acc-finishing', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-success btn-sm">ACC
                                                                        Finishing</button>
                                                                </form>
                                                            @elseif ($item->status === 'menunggu')
                                                                <a href="{{ route('admin.job-produksi.edit', $item->id) }}"
                                                                    class="avatar-text avatar-md">
                                                                    <i class="feather-edit"></i>
                                                                </a>

                                                                <form
                                                                    action="{{ route('admin.job-produksi.destroy', $item->id) }}"
                                                                    method="POST" class="d-inline form-delete">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="avatar-text avatar-md bg-soft-danger text-danger border-0">
                                                                        <i class="feather-trash-2"></i>
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <span class="text-muted">-</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- [ Main Content ] end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <footer class="footer" style="margin-top:200px">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright ©</span>
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
        </footer>
    </main>
    <!--! [End] Main Content !-->
    @include('layouts.admin.footer')
