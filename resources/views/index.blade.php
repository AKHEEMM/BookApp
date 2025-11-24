@extends('layout.app')
@section('title', 'Welcome Page')

@section('content')
    <div class="container py-4">
        <div class="panel-strong mb-4 p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h4 mb-0">Dashboard</h1>
                    <div class="muted small">Overview of your book library</div>
                </div>
                <div>
                    <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="panel p-3">
                        <div class="stat">
                            <div class="display-6">📚</div>
                            <div>
                                <div class="muted small">Total Books</div>
                                <div class="num">{{ $totalBooks ?? 0 }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel p-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="muted small">Recent additions</div>
                                <strong>{{ ($latestBooks->count() ?? 0) }} new</strong>
                            </div>
                            <div>
                                <a href="{{ route('books.index') }}" class="muted">Manage all books</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Latest Books</h5>
            <a href="{{ route('books.index') }}" class="muted small">View all</a>
        </div>

        <div class="row g-3">
            @forelse($latestBooks as $book)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card card-industrial h-100">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">{{ \Illuminate\Support\Str::limit($book->title, 40) }}</h6>
                            <p class="card-text muted mb-2">{{ $book->author ?? 'Unknown' }}</p>
                            <p class="muted small mb-3">{{ optional($book->published_at)->format('Y-m-d') ?? '—' }}</p>
                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-primary">View</a>
                                <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="panel p-3">No books found. <a href="{{ route('books.create') }}">Add your first book</a>.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection