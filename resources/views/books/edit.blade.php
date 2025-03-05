<!-- resources/views/books/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Sửa thông tin sách')

@section('content')
    <h1>Sửa thông tin sách</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" id="title" value="{{ $book->title }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="author">Tác giả:</label>
            <input type="text" name="author" id="author" value="{{ $book->author }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea name="description" id="description" class="form-control">{{ $book->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Trở lại danh sách sách</a>
    </form>
@endsection
