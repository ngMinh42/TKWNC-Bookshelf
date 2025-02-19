<!-- resources/views/books/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Danh sách sách</h1>
    <a href="{{ route('books.create') }}">Thêm sách mới</a>
    <ul>
        @foreach ($books as $book)
            <li>
                <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a> - 
                {{ $book->author }} - 
                {{ $book->price }} đ
                <a href="{{ route('books.edit', $book->id) }}">Sửa</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Xóa</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
