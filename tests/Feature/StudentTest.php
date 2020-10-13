<?php

namespace Tests\Feature;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_create_a_new_student()
    {
        $response = $this->post('/students', $this->student_data());
        $response->assertRedirect('/students/list');
        $response->assertStatus(302);
        $response->assertSessionHas('message', 'Student created successfully.');
        $this->assertCount(1, Student::all());
        $this->assertInstanceOf(Carbon::class, Student::first()->dob);
    }

    /** @test */
    public function a_student_should_have_a_unique_studentcode()
    {
        $this->post('/students', $this->student_data());

        $response = $this->post('/students', $this->student_data());

        $response->assertSessionHasErrors('errors', 'Student Code already exists.');
        $this->assertCount(1, Student::all());
    }

    /** @test */
    public function a_student_can_be_updated()
    {
        $this->post('/students', $this->student_data());

        $this->patch('/students/' . Student::first()->id, array_merge($this->student_data(), ['lastname' => 'Doe']));

        $this->assertEquals('Doe', Student::first()->lastname);
    }

    /** @test*/
    public function a_student_can_be_deleted()
    {
        $this->post('/students', $this->student_data());

        $this->delete('/students/' . Student::first()->id);

        $this->assertCount(0, Student::all());
    }

    protected function student_data()
    {
        return [
            'firstname' => 'Jane',
            'lastname' => 'Smith',
            'gender' => 'female',
            'classname' => 'Form 1A',
            'studentcode' => 'N0125590N',
            'dob' => '08-08-1988'
        ];
    }
}
