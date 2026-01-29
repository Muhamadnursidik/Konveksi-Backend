@include('layouts.pemotong.head-page')

<!--! [Start] Navigation Manu !-->
@include('layouts.pemotong.sidebar')
<!--! [End]  Navigation Manu !-->

<!--! [Start] Header !-->
@include('layouts.pemotong.navbar')
<!--! [End] Header !-->
<!--! [Start] Main Content !-->
<main class="nxl-container">
    <div class="nxl-content">

        {{-- PAGE HEADER --}}
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Job Pemotongan</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">Pemotong</li>
                    <li class="breadcrumb-item active">Job Potong</li>
                </ul>
            </div>
        </div>

        {{-- MAIN CONTENT --}}
        <div class="main-content">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card stretch stretch-full">

                        <div class="card-header">
                            <h5 class="card-title">Job Menunggu Dipotong</h5>
                        </div>

                        <div class="card-body custom-card-action p-0">
                            <x-alert />

                            <div class="table-responsive">
                                <table id="datatable-model" class="table table-hover align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Model</th>
                                            <th>Bahan Baku</th>
                                            <th>Target</th>
                                            <th>Status</th>
                                            <th>Upload Bukti</th>
                                            <th class="text-end">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($jobs as $job)
                                            <tr>
                                                <td>{{ $job->modelPakaian->nama_model }}</td>
                                                <td>{{ $job->bahanBaku->nama_bahan }}</td>
                                                <td>{{ $job->jumlah_target }}</td>

                                                <td>
                                                    <span class="badge bg-soft-warning text-warning">
                                                        Menunggu
                                                    </span>
                                                </td>

                                                {{-- FORM UPLOAD --}}
                                                <td style="width:220px">
                                                    <form method="POST"
                                                        action="{{ route('pemotong.job-potong.selesai', $job->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div
                                                                class="wd-50 ht-50 position-relative overflow-hidden border rounded flex-shrink-0">
                                                                <img id="preview-image"
                                                                    src="{{ asset('assets/images/placeholder.png') }}"
                                                                    class="img-fluid h-100 w-100 rounded"
                                                                    alt="">
                                                                <input type="file" name="foto_bukti"
                                                                    class="position-absolute top-0 start-0 w-100 h-100 opacity-0"
                                                                    onchange="previewImage(this)" accept="image/*"
                                                                    required>
                                                            </div>
                                                            <div class="fs-11 text-muted">
                                                                Upload Bukti Potong <br>
                                                                PNG / JPG / JPEG<br>
                                                                Max 2MB
                                                            </div>
                                                        </div>
                                                </td>

                                                <td class="text-end">
                                                    <button type="submit"
                                                        class="btn btn-sm bg-soft-success text-success border-0">
                                                        <i class="feather-upload me-1"></i>
                                                        Kirim Bukti
                                                    </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">
                                                    Tidak ada job menunggu pemotongan
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
</main>

<!--! [End] Main Content !-->

<!--! [End] Main Content !-->
@include('layouts.pemotong.footer')
