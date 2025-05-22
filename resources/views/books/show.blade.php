@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Buku</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Judul:</strong> {{ $book->title }}</li>
        <li class="list-group-item"><strong>Penulis:</strong> {{ $book->author }}</li>
        <li class="list-group-item"><strong>Penerbit:</strong> {{ $book->publisher }}</li>
        <li class="list-group-item"><strong>Tahun:</strong> {{ $book->year }}</li>
    </ul>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
