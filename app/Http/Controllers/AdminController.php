<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard()
    {
        $books = Book::with('category')->get();
        return view('admin.dashboard', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'author' => 'required',
            'price' => 'required|numeric',
            'available' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        Book::create($data);
        return redirect('/admin/dashboard')->with('success', 'Book added!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'author' => 'required',
            'price' => 'required|numeric',
            'available' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        Book::where('id', $id)->update($data);
        return redirect('/admin/dashboard')->with('success', 'Book updated!');
    }

    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return back()->with('success', 'Book deleted!');
    }
}
