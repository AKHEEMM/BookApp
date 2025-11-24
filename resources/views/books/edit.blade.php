@extends('layout.app')

@section('title', 'Edit Book')

@section('content')
<div class="container">
    <div class="card card-industrial">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Edit Book</h3>
                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary btn-sm">Back to list</a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.update', $book) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control animated-input" value="{{ old('title', $book->title) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" name="author" class="form-control animated-input" value="{{ old('author', $book->author) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Published At</label>
                    <input type="date" name="published_at" class="form-control animated-input" value="{{ optional($book->published_at)->format('Y-m-d') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control animated-input" rows="5">{{ old('description', $book->description) }}</textarea>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
