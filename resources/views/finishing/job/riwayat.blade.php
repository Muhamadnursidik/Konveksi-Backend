<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    @include('layouts/finishing/head-page-meta', ['title' => 'Home'])
    @include('layouts/finishing/head-css')
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    @include('layouts/finishing/sidebar')
    @include('layouts/finishing/navbar')

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
                        <li class="breadcrumb-item"><a href="{{ route('finishing.job-finishing.index') }}">Data Job Finishing</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Riwayat</a></li>
                    </ul>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="card">
                <div class="card-header">
                    <h5>Riwayat Finishing</h5>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Model</th>
                                <th>Jumlah</th>
                                <th>Tanggal Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $job->modelPakaian->nama_model }}</td>
                                    <td>{{ $job->jumlah_target }}</td>
                                    <td>{{ $job->updated_at->format('d-m-Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    @include('layouts/finishing/footer-block')
    @include('layouts/finishing/footer-js')
</body>
<!-- [Body] end -->

</html>
