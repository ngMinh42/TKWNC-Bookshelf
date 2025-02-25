<!-- resources/views/books/index.blade.php -->

@extends('layouts.app')

@section('title', 'Danh sách sách')

@section('content')
    <h1>Danh sách sách</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-4 book-card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">Tác giả: {{ $book->author }}</p>
                        <p class="card-text">Giá: {{ number_format($book->price, 3, '.', '.') }} đ</p>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Chi tiết</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Sửa</a>

                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
