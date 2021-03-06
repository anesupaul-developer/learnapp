<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index', ["books" => Book::all()]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store()
    {
        Book::create($this->validateBook());

        return redirect('/books')->with('message', 'Student created successfully.');
    }

    protected function validateBook()
    {
        return request()->validate([
            'title' => 'required',
            'author' => 'required',
            'barcode' => 'required'
        ]);
    }
}
