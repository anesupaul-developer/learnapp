<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Student;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('reservations.index', ["reservations" => Reservation::all()]);
    }

    public function create()
    {
        return view('reservations.create', [
            "students" => Student::all(),
            "books" => Book::all()
        ]);
    }

    public function store(Request $request)
    {
        $reservation = new Reservation();
        $reservation->user_id = Auth::user()->id;
        $reservation->book_id = $request->input('book_id');
        $reservation->student_id = $request->input('student_id');

        $reservation->save();

        return redirect('reservations')->with('message', 'Book has been checked out successfully.');
    }

    public function update(Reservation $reservation)
    {
        $reservation->update(
            ['checkedin_at' => now()]
        );
        redirect('reservations')->with('message', 'Book has been checked in successfully.');
    }
}
