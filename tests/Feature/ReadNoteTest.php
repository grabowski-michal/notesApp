<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Note;

class ReadNoteTest extends TestCase
{
    /**
     * Check if UI shows user the first 10 notes (due to pagination)
     * and if they match the database's table `notes` contents
     *
     * @return void
     */
    public function test_example()
    {
        $notes = Note::all();
        $response = $this->get('/');
        $i = 0; $length = 0;
        if (count($notes) >= 10) $length = 10;
        else $length = count($notes);

        for ($i=0; $i < $length; $i++) { 
            $id = $notes[$i]->id;
            $response->assertSeeText($notes[$i]->title);
        }
    }
}
