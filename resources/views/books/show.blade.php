@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $book->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Description:</strong> {{ $book->description }}</p>
            <p><strong>Price:</strong> ₹{{ number_format($book->price, 2) }}</p>
            <p><strong>Category:</strong> {{ $book->category->name ?? 'Uncategorized' }}</p>
        </div>
        <div class="card-footer text-end">
            <a href="{{ url('/books') }}" class="btn btn-secondary">← Back to List</a>
        </div>
    </div>
</div>
@endsection

