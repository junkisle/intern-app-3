<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        $Notes = Note::all();

        return view('folder-notes.index')->with(['user_id' => $userId,
                                                 'Notes' => $Notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($user_id)
    {
        return view('folder-notes.create')->with(['user_id' => $user_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        $newNote = Note::create($data);
        
        if($newNote){
            return redirect()->route('intern.note.index');
        } else {
            return back()->with('error', 'Failed to create a new note');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}
