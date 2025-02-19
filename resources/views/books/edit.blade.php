<!-- resources/views/books/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Sửa thông tin sách</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" id="title" value="{{ $book->title }}" required>
        </div>
        <div>
            <label for="author">Tác giả:</label>
            <input type="text" name="author" id="author" value="{{ $book->author }}" required>
        </div>
        <div>
            <label for="price">Giá:</label>
            <input type="number" name="price" id="price" value="{{ $book->price }}" required step="0.01">
        </div>
        <button type="submit">Cập nhật</button>
    </form>

    <a href="{{ route('books.index') }}">Trở lại danh sách sách</a>
@endsection
