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
    <h2 class="mb-4 text-center">Add New Book</h2>

    <form action="{{ url('/admin/books') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Book Title <span class="text-danger">*</span></label>
            <input name="title" id="title" type="text" class="form-control" placeholder="Enter book title" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
            <input name="author" id="author" type="text" class="form-control" placeholder="Enter author name" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price (₹) <span class="text-danger">*</span></label>
            <input name="price" id="price" type="number" step="0.01" class="form-control" placeholder="Enter book price" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Write a short description..."></textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="" disabled selected>Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="available" id="available" value="1" checked>
            <label class="form-check-label" for="available">
                Available for sale
            </label>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success">Add Book</button>
        </div>
    </form>
</div>
@endif
@endsection
