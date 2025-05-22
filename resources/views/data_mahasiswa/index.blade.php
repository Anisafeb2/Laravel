@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Data Mahasiswa</h2>

    <a href="{{ route('data-mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Foto</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $mhs)
                <tr>
                    <td>
                        @if($mhs->foto)
                            <img src="{{ asset('Upload/Image/' . $mhs->foto) }}" alt="Foto" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->prodi }}</td>
                    <td>{{ $mhs->angkatan }}</td>
                    <td>
                        <a href="{{ route('data-mahasiswa.edit', ['data_mahasiswa' => $mhs->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('data-mahasiswa.destroy', ['data_mahasiswa' => $mhs->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
