<!-- resources/views/books/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Thêm sách mới</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="author">Tác giả:</label>
            <input type="text" name="author" id="author" required>
        </div>
        <div>
            <label for="price">Giá:</label>
            <input type="number" name="price" id="price" required step="0.01">
        </div>
        <button type="submit">Lưu</button>
    </form>

    <a href="{{ route('books.index') }}">Trở lại danh sách sách</a>
@endsection
