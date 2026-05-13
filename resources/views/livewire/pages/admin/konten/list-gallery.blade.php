@php
    $heads = ['Nama', 'Tanggal Dibuat', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
@endphp

<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">Tambah Foto Gallery</a>
    </div>
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('error') }}
            </div>
        @endif
        <x-adminlte-datatable id="table_gallery" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
            bordered />
    </div>
</div>
