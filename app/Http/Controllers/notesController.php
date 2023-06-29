<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\notes;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class notesController extends Controller
{
    /**
     * Show the path for notes.
     */
    public function notesDash(){
        return view ('dashboard.notes');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userdata = Auth::User();
        $notedata = notes::where('user_id', $userdata->id)->orderBy('id', 'desc')->get();
        return view('dashboard.notes', compact('userdata','notedata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.compose');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recorded = notes::create($request->all());
        return back()->with('success', 'Notes has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notes = notes::find($id);
        if(!$notes){
            return View('404');
        }
        return View ('dashboard.readNotes')->with('NotesData', $notes);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $noteId = notes::find($id);

        return view('dashboard.edit')->with('notedata', $noteId);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $noteId = notes::find($id);
        $record = $request->all();
        $noteId->update($record);

        return redirect('/dashboard/notes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = notes::find($id);

        $record->delete();
        return redirect('/dashboard/notes');

    }
}
