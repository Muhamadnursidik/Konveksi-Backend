{{-- ALERT SUKSES --}}
@if (session('success'))
    <div style="background:#d4edda; padding:10px; margin-bottom:10px;">
        {{ session('success') }}
    </div>
@endif

{{-- ALERT ERROR VALIDASI --}}
@if (session('errors'))
    <div style="background:#F0404F; padding:10px; margin-bottom:10px; color:#ffff;">
        {{ session('errors') }}
    </div>
@endif
