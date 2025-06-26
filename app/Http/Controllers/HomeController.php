<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get('https://www.googleapis.com/books/v1/volumes?q=laravel');
        $books = $response->json()['items'] ?? [];
        return view('home', compact('books'));
    }
}
