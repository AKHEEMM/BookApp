@extends('layout.app')

@section('title', 'Books')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Create New Book</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <section class="content">
            @if($books->count())
                <div class="card card-industrial mb-3">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table books-table mb-0 align-middle">
                                <thead class="text-muted small">
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Published</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $book->title }}</td>
                                            <td class="muted">{{ $book->author ?? '—' }}</td>
                                            <td class="muted">{{ optional($book->published_at)->format('Y-m-d') ?? '—' }}</td>
                                            <td class="text-end">
                                                <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-primary me-1">View</a>
                                                <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                                                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this book?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{ $books->links() }}
            @else
                <div class="panel p-4">No books yet — <a href="{{ route('books.create') }}">Create your first book</a>.</div>
            @endif
        </section>
</div>
@endsection
