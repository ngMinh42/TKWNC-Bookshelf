<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::all(); // Trả về tất cả sách
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
        ]);

        $book = Book::create($request->all()); // Tạo sách mới
        return response()->json($book, 201); // Trả về sách vừa tạo với mã trạng thái 201
    }

    public function show(Book $book)
    {
        return $book; // Trả về thông tin sách theo ID
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
        ]);

        $book->update($request->all()); // Cập nhật thông tin sách
        return response()->json($book, 200); // Trả về thông tin sách đã cập nhật
    }

    public function destroy(Book $book)
    {
        $book->delete(); // Xóa sách
        return response()->json(null, 204); // Trả về mã trạng thái 204 (No Content)
    }
}
