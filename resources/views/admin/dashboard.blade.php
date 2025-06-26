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
    <div class="position-relative mb-4">
    <form action="{{ url('/logout') }}" method="POST" class="position-absolute top-0 end-0">
        @csrf
        <button type="submit" class="btn btn-danger mt-2 me-2">Logout</button>
    </form>

    <h2 class="text-center">Admin Dashboard</h2>
</div>

    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" id="error-alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ url('/admin/books/create') }}" class="btn btn-success">Add New Book</a>
    </div>

    @if($books->isEmpty())
        <div class="alert alert-info text-center">
            No books available.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle" id="adminBooksTable">
                <thead class="table-primary">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>₹{{ number_format($book->price, 2) }}</td>
                            <td>{{ $book->category->name ?? 'N/A' }}</td>
                            <td class="text-center">
                                <a href="{{ url('/admin/books/' . $book->id . '/edit') }}" class="btn btn-sm btn-warning me-1">Edit</a>
                                <form method="POST" action="{{ url('/admin/books/' . $book->id) }}" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endif
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#success-alert, #error-alert').fadeOut('slow');
        }, 3000);

        $('#adminBooksTable').DataTable({
            responsive: true,
            paging: true,
            ordering: true,
            searching: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search books..."
            },
            columnDefs: [
                { orderable: false, targets: 5 } 
            ]
        });
    });
</script>
@endpush
