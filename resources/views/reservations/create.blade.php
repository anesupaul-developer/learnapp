@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.navigation')
        </div>
        <div id="show_content" class="col-md-6 col-offset-3">
            <!-- List all the reservations -->
            <h3>Create New Reservation</h3>
            <form action="/reservations" method="post">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="student">Student Name</label>
                        <select name="student_id" class="form-control" id="student_id">
                            @foreach($students as $student)
                                <option value="{{ $student->id}}"> {{ $student->lastname }} {{ $student->firstname }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="book_id">Book Title</label>
                        <select name="book_id" class="form-control" id="book_id">
                            @foreach($books as $book)
                                <option value="{{ $book->id}}"> {{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-outline-success">CREATE</button>
                </form-group>
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection