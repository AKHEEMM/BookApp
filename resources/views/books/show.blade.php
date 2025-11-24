@extends('layout.app')

@section('title', 'View Book')

@section('content')
<div class="container">
    <div class="card card-industrial">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h3 class="mb-1">{{ $book->title }}</h3>
                    <div class="muted">{{ $book->author ?? 'Unknown' }} • {{ optional($book->published_at)->format('Y-m-d') ?? '—' }}</div>
                </div>
                <div class="text-end">
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                    <a href="{{ route('books.index') }}" class="btn btn-link btn-sm">Back</a>
                </div>
            </div>

            <hr class="border-1 border-secondary">
            <div class="mt-3">
                <p class="mb-0">{{ $book->description ?: 'No description provided.' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
