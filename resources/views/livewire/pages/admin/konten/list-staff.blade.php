@php
    $heads = ['Nama', 'Jabatan', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
@endphp

<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">Tambah Staff</a>
    </div>
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                {{ session('error') }}
            </div>
        @endif

        <x-adminlte-datatable id="table_staff" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
            bordered />
    </div>
</div>
