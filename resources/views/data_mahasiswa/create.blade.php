@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 fw-semibold">Form Tambah Data Mahasiswa</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('data-mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') }}">
                            @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Program Studi</label>
                            <input type="text" name="prodi" class="form-control @error('prodi') is-invalid @enderror" value="{{ old('prodi') }}">
                            @error('prodi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Angkatan</label>
                            <input type="number" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror" value="{{ old('angkatan') }}">
                            @error('angkatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('data-mahasiswa.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
