@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.navigation')
        </div>
        <div id="show_content" class="col-md-9">
            <!-- List all the students -->
            <h3>Book List</h3>
            @if (session('message'))
                <ul>
                    <li class="alert alert-success" style="color: #0a5523">{{ session('message') }}</li>
                </ul>
            @endif
            <table class="table">
                <thead class="thead-student">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Barcode</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td> {{ $book->title}} </td>
                            <td> {{ $book->author}} </td>
                            <td> {{ $book->barcode}} </td>
                        </tr>    
                    @endforeach
                </tbody>
</table>
        </div>
    </div>
</div>
@endsection