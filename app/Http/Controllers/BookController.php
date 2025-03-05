<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index(Request $request)
{
    $books = Book::all();
    $search = $request->input('search');
    $sortBy = $request->input('sort_by', 'title_asc');

    if ($search) {
        $books = Book::where('title', 'LIKE', "%$search%")
            ->orWhere('author', 'LIKE', "%$search%")
            ->get();
    } else {
        if (!$sortBy) {
            $books = Book::all();
        } else {
            switch ($sortBy) {
                case 'title_asc':
                    $books = Book::orderBy('title', 'asc')->get();
                    break;
                case 'title_desc':
                    $books = Book::orderBy('title', 'desc')->get();
                    break;
                case 'author_asc':
                    $books = Book::orderBy('author', 'asc')->get();
                    break;
                case 'author_desc':
                    $books = Book::orderBy('author', 'desc')->get();
                    break;
            }
        }
    }

    return view('books.index', compact('books', 'search'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'description' => 'nullable', // Thêm validation cho mô tả
    ]);

    Book::create($request->all());

    return redirect()->route('books.index')
                    ->with('success','Book created successfully.');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
{
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'description' => 'nullable', // Thêm validation cho mô tả
    ]);

    $book->update($request->all());

    return redirect()->route('books.index')
                    ->with('success','Book updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
                        ->with('success','Book deleted successfully');
    }
}
