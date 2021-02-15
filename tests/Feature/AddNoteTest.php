<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddNoteTest extends TestCase
{
    /**
     * A simple test checking integrity of database fields
     * after posting one new note to /addNote route
     *
     * @return void
     */
    public function test_example()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomTitleLength = rand(3, 30);
        $randomContentLength = rand(5, 300);
        
        $randomTitle = '';
        $randomContent = '';
        for ($i = 0; $i < $randomTitleLength; $i++) {
            $randomTitle .= $characters[rand(0, $charactersLength - 1)];
        }
        for ($i = 0; $i < $randomContentLength; $i++) {
            $randomContent .= $characters[rand(0, $charactersLength - 1)];
        }

        $response = $this->post('/addNote', [
            'title' => $randomTitle,
            'content' => $randomContent
        ]);

        $response->assertRedirect();
        
        $response = $this->assertDatabaseHas('notes',
        [
            'title' => $randomTitle,
            'content' => $randomContent
        ]);
    }
}
