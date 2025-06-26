@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center"> Google Books API Results</h1>
    <div class="row">
        @forelse($books as $book)
            @php
                $info = $book['volumeInfo'];
                $title = $info['title'] ?? 'N/A';
                $authors = isset($info['authors']) ? implode(', ', $info['authors']) : 'Unknown';
                $description = $info['description'] ?? 'No description available.';
                $thumbnail = $info['imageLinks']['thumbnail'] ?? 'https://via.placeholder.com/128x192?text=No+Image';
            @endphp

            <div class="col-md-4 mb-4" >
                <div class="card h-100 shadow-sm">
                    <img src="{{ $thumbnail }}" class="card-img-top" alt="{{ $title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $title }}</h5>
                        <p class="card-text"><strong>Author(s):</strong> {{ $authors }}</p>
                        <p class="card-text text-truncate" style="max-height: 4.5em; overflow: hidden;">
                            {{ strip_tags($description) }}
                        </p>
                        <a href="{{ $info['previewLink'] ?? '#' }}" class="btn btn-primary mt-auto" target="_blank">Preview Book</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">No books found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
