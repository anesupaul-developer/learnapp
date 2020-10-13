@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.navigation')
        </div>
        <div id="show_content" class="col-md-9">
            <!-- List all the students -->
            <h3>Student List</h3>
            @if (session('message'))
                <ul>
                    <li class="alert alert-success" style="color: #0a5523">{{ session('message') }}</li>
                </ul>
            @endif
            <table class="table">
                <thead class="thead-student">
                    <tr>
                        <th scope="col">FirstName</th>
                        <th scope="col">LastName</th>
                        <th scope="col">StudentCode</th>
                        <th scope="col">Gender</th>
                        <th scope="col">ClassName</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td> {{ $student->firstname }}</td>
                            <td> {{ $student->lastname }}</td>
                            <td> {{ $student->studentcode }}</td>
                            <td> {{ $student->gender }}</td>
                            <td> {{ $student->classname }}</td>
                        </tr>
                    @endforeach
                </tbody>
</table>
        </div>
    </div>
</div>
@endsection