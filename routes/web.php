<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Books;

Route::get('/', function () {
    $latestBooks = Books::orderBy('created_at', 'desc')->take(12)->get();
    $totalBooks = Books::count();
    return view('index', [
        'latestBooks' => $latestBooks,
        'totalBooks' => $totalBooks,
    ]);
});

Route::resource('books', BookController::class);


