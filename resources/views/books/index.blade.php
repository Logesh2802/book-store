@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Available Books</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="booksTable">
            <thead class="table-primary">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price (₹)</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>
                            <a href="{{ url('/books/' . $book->id) }}" class="text-decoration-none text-primary">
                                {{ $book->title }}
                            </a>
                        </td>
                        <td>{{ $book->author }}</td>
                        <td>{{ number_format($book->price, 2) }}</td>
                        <td>{{ $book->category->name ?? 'Uncategorized' }}</td>
                        <td>
                            <a href="{{ url('/books/' . $book->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No books available at the moment.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#booksTable').DataTable({
            responsive: true,
            ordering: true,   
            searching: true,  
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search books..."
            }
        });
    });
</script>
@endpush
