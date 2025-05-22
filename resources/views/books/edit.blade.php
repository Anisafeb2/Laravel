@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Buku</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}">
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}">
            @error('author') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="publisher" class="form-label">Penerbit</label>
            <input type="text" name="publisher" class="form-control" value="{{ old('publisher', $book->publisher) }}">
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="number" name="year" class="form-control" value="{{ old('year', $book->year) }}">
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
    </form>
</div>
@endsection
