<!-- resources/views/books/show.blade.php -->

@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <h1>{{ $book->title }}</h1>
    <p>Tác giả: {{ $book->author }}</p>
    <p>Mô tả: {{ $book->description }}</p>

    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Sửa</a>

    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Trở lại danh sách sách</a>
@endsection
