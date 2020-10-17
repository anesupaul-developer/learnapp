<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Student;
use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    /** @test*/
    public function can_create_a_book_reservation()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        Student::factory()->create();
        Book::factory()->create();

        $response = $this->actingAs($user)->post(
            'reservations',
            $this->reservation_data()
        );

        $this->assertCount(1, Reservation::all());
        $this->assertNull(Reservation::first()->checkedin_at);
        $this->assertNotNull(Reservation::first()->checkout_at);
        $response->assertRedirect('reservations');
    }

    /** @test*/
    public function a_user_can_check_in_a_book()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        Student::factory()->create();
        Book::factory()->create();

        $this->actingAs($user)->post(
            'reservations',
            $this->reservation_data()
        );

        $this->actingAs($user)->patch('reservations/checkin/1');
        $this->assertNotNull(Reservation::first()->checkedin_at);
    }

    protected function reservation_data()
    {
        return [
            'student_id' => 1,
            'book_id' => 1
        ];
    }
}
