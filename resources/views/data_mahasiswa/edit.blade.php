@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Data Mahasiswa</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('data-mahasiswa.update', $data_mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="{{ $data_mahasiswa->nim }}" readonly>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $data_mahasiswa->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
            <input type="text" class="form-control" id="prodi" name="prodi" value="{{ old('prodi', $data_mahasiswa->prodi) }}" required>
        </div>

        <div class="mb-3">
            <label for="angkatan" class="form-label">Angkatan</label>
            <input type="number" class="form-control" id="angkatan" name="angkatan" value="{{ old('angkatan', $data_mahasiswa->angkatan) }}" required>
        </div>

        @if($data_mahasiswa->foto)
        <div class="mb-3">
            <label class="form-label">Foto Saat Ini</label><br>
            <img src="{{ asset('Upload/Image/' . $data_mahasiswa->foto) }}" alt="Foto Mahasiswa" class="img-thumbnail" style="max-width: 150px;">
        </div>
        @endif

        <div class="mb-3">
            <label for="foto" class="form-label">Ganti Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept=".jpg,.jpeg,.png">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('data-mahasiswa.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
