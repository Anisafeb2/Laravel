@extends('layouts.app')

@section('content')
<div class="container py-4" style="background-color: #ffe6f0; border-radius: 12px; box-shadow: 0 4px 12px rgba(255, 182, 193, 0.4);">
    <h1 class="mb-4 text-center" style="color: #d6336c; font-weight: 600; font-family: 'Poppins', sans-serif;">Data Barang</h1>

    <table class="table table-bordered table-hover" id="barang-table" style="background-color: #fff0f6; border-radius: 8px;">
        <thead style="background-color: #f8bbd0; color: #7b1fa2; font-weight: 600; font-family: 'Poppins', sans-serif;">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Harga Member</th>
                <th>Grosir 1</th>
                <th>Grosir 2</th>
                <th>Grosir 3</th>
                <th>User</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<style>
    body {
        background-color: #fff0f6;
        color: #5e305f;
        font-family: 'Poppins', sans-serif;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: #ad1457 !important;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info {
        color: #8e24aa;
        font-weight: 500;
    }

    table.dataTable tbody tr {
        background-color: #fdeef6;
        color: #6a1b9a;
    }

    table.dataTable tbody tr:hover {
        background-color: #f8bbd0;
        color: #4a148c;
    }

    table.dataTable thead {
        border-radius: 12px;
    }

    .dataTables_filter input,
    .dataTables_length select {
        background: #fce4ec;
        border: 1px solid #f8bbd0;
        color: #7b1fa2;
        border-radius: 8px;
        padding: 6px 12px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .dataTables_filter input:focus,
    .dataTables_length select:focus {
        outline: none;
        border-color: #d81b60;
        box-shadow: 0 0 8px #f48fb1;
        background: #fff0f6;
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(function () {
    $('#barang-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("barang.data") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false },
            { data: 'kode_barang', name: 'kode_barang' },
            { data: 'nama_barang', name: 'nama_barang' },
            { data: 'harga_beli', name: 'harga_beli' },
            { data: 'harga_jual', name: 'harga_jual' },
            { data: 'harga_member', name: 'harga_member' },
            { data: 'grosir1', name: 'grosir1' },
            { data: 'grosir2', name: 'grosir2' },
            { data: 'grosir3', name: 'grosir3' },
            { data: 'user', name: 'user' }
        ],
        language: {
            paginate: {
                previous: "<",
                next: ">"
            },
            processing: "Loading..."
        }
    });
});
</script>
@endpush
