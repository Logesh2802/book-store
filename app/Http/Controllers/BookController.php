<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->where('available', true)->get();
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::with('category')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Book::where('title', 'like', "%$query%")
                     ->orWhere('author', 'like', "%$query%")
                     ->with('category')
                     ->get();
        return view('books.index', compact('books'));
    }
}
