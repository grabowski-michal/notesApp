<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\NoteRequest;
use App\Models\Note;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::sortable()->paginate(10);
        return view('notes', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $note = new Note();
        return view('noteAddForm', compact('note'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;
        if ($note->save()) {
            return redirect()->route('notes');
        }
        return "An error has occured while saving the note (enable MySQL DB!).";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::find($id);
        return view('noteEditForm', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoteRequest $request, $id)
    {
        $note = Note::find($id);
        $note->title = $request->title;
        $note->content = $request->content;
        if ($note->save()) {
            return redirect()->route('notes');
        }
        return "An error during saving note has occured. Please check the MySQL integration or call the administrator.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        if ($note->delete()) {
            return redirect()->route('notes')->with(['success' => true,
                                            'message_type' => 'success',
                                            'message' => 'Successfully removed the note.']);
        }
        return "An error during deleting the note has occured. Please check the MySQL integration or call the administrator.";
    }

    /**
     * Show the history of specified note.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function history($id) {
        $noteHistory = Note::find($id)->versions;
        $title = 'Note '.$noteHistory[0]->versionable_id;
        foreach ($noteHistory as $key => $value) {
            $value->model_data = unserialize($value->model_data);
        }
        return view('noteHistory', compact('noteHistory'), compact('title'));
    }

    public function fullHistory() {
        $noteHistory = DB::table('versions')->paginate(10);
        $title = "All notes";
        foreach ($noteHistory as $key => $value) {
            $value->model_data = unserialize($value->model_data);
        }
        return view('noteHistory', compact('noteHistory'), compact('title'));
    }
}
