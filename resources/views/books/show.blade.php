<!-- resources/views/books/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p>Tác giả: {{ $book->author }}</p>
    <p>Giá: {{ $book->price }} đ</p>

    <a href="{{ route('books.edit', $book->id) }}">Sửa</a>

    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Xóa</button>
    </form>

    <a href="{{ route('books.index') }}">Trở lại danh sách sách</a>
@endsection
