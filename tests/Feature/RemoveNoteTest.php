<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Note;

class RemoveNoteTest extends TestCase
{
    /**
     * Removes first occured note (with lowest $id attr) in Note model
     * from database - test using assertDatabaseMissing
     *
     * @return void
     */
    public function test_example()
    {
        $note = NULL;
        $i = 1;

        while ($note == NULL) {
            $note = Note::find($i);
            $i++;
            if ($i > 4e9) {
                $this->assertTrue(false);
            }
        }

        $id = $note->id;

        $response = $this->get('/removeNote/'.$id.'');
        $response->assertRedirect();

        $response = $this->assertDatabaseMissing('notes',
        [
            'id' => $id
        ]);
    }
}
