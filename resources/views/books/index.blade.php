<!-- resources/views/books/index.blade.php -->

@extends('layouts.app')

@section('title', 'Danh sách sách')

@section('content')
    <h1>Danh sách sách</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

     <!-- Thêm phần search box -->
     <form action="{{ route('books.index') }}" method="GET">
        <input type="text" name="search" placeholder="Tìm kiếm...">
        <button type="submit">Tìm</button>
    </form>

    <!-- Thêm phần tùy chọn sắp xếp -->
    <form action="{{ route('books.index') }}" method="GET">
        <select name="sort_by">
            <option value="title_asc">Tên truyện A-Z</option>
            <option value="title_desc">Tên truyện Z-A</option>
            <option value="author_asc">Tác giả A-Z</option>
            <option value="author_desc">Tác giả Z-A</option>
        </select>
        <button type="submit">Sắp xếp</button>
    </form>

    @if (count($books) == 0 && $search)
        <div class="alert alert-info">Không có kết quả tìm kiếm.</div>
    @endif

    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-4 book-card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">Tác giả: {{ $book->author }}</p>
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
