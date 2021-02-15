<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Note;

class UpdateNoteTest extends TestCase
{
    /**
     * Edit first 10 found titles and contents to random
     * and check if they match with database contents
     *
     * @return void
     */
    public function test_example()
    {
        $notes = Note::all();
        $length = 0;
        if (count($notes) >= 10) $length = 10;
        else $length = count($notes);

        for ($i=0; $i < $length; $i++) {
            $note = $notes[$i];
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomTitleLength = rand(3, 30);
            $randomContentLength = rand(5, 300);
            
            $randomTitle = '';
            $randomContent = '';
            for ($j = 0; $j < $randomTitleLength; $j++) {
                $randomTitle .= $characters[rand(0, $charactersLength - 1)];
            }
            for ($j = 0; $j < $randomContentLength; $j++) {
                $randomContent .= $characters[rand(0, $charactersLength - 1)];
            }
            
            $note->title = $randomTitle;
            $note->content = $randomContent;
            if ($note->save()) {
                $response = $this->assertDatabaseHas('notes',
                [
                    'title' => $randomTitle,
                    'content' => $randomContent
                ]);
            }
        }
    }
}
