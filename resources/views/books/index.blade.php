@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->year }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
