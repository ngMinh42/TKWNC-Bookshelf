<!-- resources/views/books/create.blade.php -->

@extends('layouts.app')

@section('title', 'Thêm sách mới')

@section('content')
    <h1>Thêm sách mới</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="author">Tác giả:</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Trở lại danh sách sách</a>
    </form>
@endsection
