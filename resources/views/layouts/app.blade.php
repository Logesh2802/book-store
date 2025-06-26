<!DOCTYPE html>
<html>
<head>
    <title>Online Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

</head>
<body>
    <div class="container mt-4">
        @yield('content')
        @stack('scripts')
    </div>

</body>
</html>
