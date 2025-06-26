@extends('layouts.app')

@section('content')
@if(!session('auth_token'))
        <div class="container mt-4">
            <div class="alert alert-danger text-center">
                Unauthorized access. Please <a href="{{ url('/login') }}">login</a>.
            </div>
        </div>
    @else
<div class="container mt-4">
    <h2 class="mb-4 text-center">Edit Book</h2>

    <form action="{{ url('/admin/books/' . $book->id) }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Book Title <span class="text-danger">*</span></label>
            <input name="title" id="title" type="text" class="form-control" value="{{ old('title', $book->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
            <input name="author" id="author" type="text" class="form-control" value="{{ old('author', $book->author) }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price (₹) <span class="text-danger">*</span></label>
            <input name="price" id="price" type="number" step="0.01" class="form-control" value="{{ old('price', $book->price) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Edit book description...">{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="" disabled>Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="available" id="available" value="1" {{ $book->available ? 'checked' : '' }}>
            <label class="form-check-label" for="available">
                Available for sale
            </label>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Update Book</button>
        </div>
    </form>
</div>
@endif
@endsection
