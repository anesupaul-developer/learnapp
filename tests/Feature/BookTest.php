<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_create_a_book()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/book', $this->bookdata());

        $this->assertCount(1, Book::all());
        $response->assertStatus(302);
        $response->assertRedirect('/books');
    }

    private function bookdata()
    {
        return [
            'title' => 'Mufos Search',
            'author' => 'John Davies',
            'barcode' => 'ABCDEF123'
        ];
    }
}
