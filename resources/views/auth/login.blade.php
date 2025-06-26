@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow rounded-4 p-4" style="width: 100%; max-width: 400px;">
        @if(session('success'))
        <div class="alert alert-success success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger error" id="error-alert">
            {{ session('error') }}
        </div>
    @endif
        <h3 class="text-center mb-4">Login</h3>
        <form id="loginForm" method="POST" action="{{route('loginCheck')}}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required>
                <small class="text-danger" id="email-error"></small>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
                <small class="text-danger" id="password-error"></small>
            </div>

            <div id="error-message" class="alert alert-danger d-none"></div>

            <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
        setTimeout(function () {
            $('#success-alert, #error-alert').fadeOut('slow');
        }, 3000);
    });
</script>

@endpush