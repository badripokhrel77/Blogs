@extends('layout.main')
@section('title', 'Dashboard')
@section('content')
<div class="container mt-5">

    <!-- Success message (hidden by default) -->
    @if(session('success'))
        <div id="success-message" class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>

        <script>
            // Show success message and hide after 5 seconds
            window.onload = function() {
                const successMessage = document.getElementById('success-message');
                successMessage.style.display = 'block'; // Show the success message
                setTimeout(function() {
                    successMessage.style.display = 'none'; // Hide after 5 seconds
                }, 5000);
            };
        </script>
    @endif

    <div class="d-flex align-items-center mb-4">
        <h1 class="mx-auto">Blog Posts</h1>
        <a href="{{ url('create') }}" class="btn btn-primary btn-lg ms-auto">Add Post</a>
    </div>
    
    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-dark mb-3 h-100">
                    <div class="card-header">{{ $blog->title }}</div>
                    <div class="card-body p-0">
                        <div class="card-img-top" style="height: 200px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        <p class="text-muted mt-3">Category: {{ $blog->category }}</p>
                        <p class="card-text">{{ Str::limit($blog->description, 100) }}</p>
                    </div>
                    <div class="card-footer text-center">
                        <span class="badge bg-{{ $blog->status === 'active' ? 'success' : 'secondary' }}">
                            {{ ucfirst($blog->status) }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $blogs->links() }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endsection
