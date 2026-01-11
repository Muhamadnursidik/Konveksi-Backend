{{-- ALERT SUKSES --}}
@if (session('success'))
    <div style="background:#d4edda; padding:10px; margin-bottom:10px;">
        {{ session('success') }}
    </div>
@endif

{{-- ALERT ERROR VALIDASI --}}
@if ($errors->any())
    <div style="background:#f8d7da; padding:10px; margin-bottom:10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
