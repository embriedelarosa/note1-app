<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all(); // Fetch all notes
        return view('notes.index', compact('notes'));
    }    
    
    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        // Validate and save the note
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:10000',
        ]);

        Note::create($validatedData);
        return redirect()->route('notes.index');
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note')); // Pass the note to the edit view
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
        ]);
    
        // Find the note by ID and update it
        $note = Note::findOrFail($id);
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->save();
    
        // Redirect back with a success message
        return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
    }
    
    

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success','Note deleted successfully and is no longer existing.');
    }
}


