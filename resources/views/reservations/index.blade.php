@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.navigation')
        </div>
        <div id="show_content" class="col-md-9">
            <!-- List all the students -->
            <h3>Reservation List</h3>
            @if (session('message'))
                <ul>
                    <li class="alert alert-success" style="color: #0a5523">{{ session('message') }}</li>
                </ul>
            @endif
            <table class="table">
                <thead class="thead-student">
                    <tr>
                        <th scope="col">Issued By</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">CheckedOutAt</th>
                        <th scope="col">CheckedInAt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td> {{ $reservation->user->name }} </td>
                            <td> {{ $reservation->book->title }} </td>
                            <td> {{ $reservation->student->lastname }} {{ $reservation->student->firstname }}</td>
                            <td> {{ $reservation->checkout_at }} </td>
                            <td>
                                @if($reservation->checkedin_at !== null && $reservation->checkedin_at != '')
                                    {{ $reservation->checkedin_at }} 
                                @else
                            <form action="/reservations/checkin/{{$reservation->id}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button class="check_in_link" type="submit"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection