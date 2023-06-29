<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\important;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class importantController extends Controller
{
    public function importantNote(){
        return View('important.impnotes');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userdata = Auth::User();
        $importantData = important::where('user_id', $userdata->id)->orderBy('id', 'desc')->get();
        return view('important.impnotes', compact('userdata','importantData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('important.impcompose');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recorded = important::create($request->all());
        return back()->with('success', 'Important Notes has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notes = important::find($id);

        if(!$notes){
            if(!$notes){
                return View('404');
            }
        }

        return View ('important.impreadNotes')->with('NotesData', $notes);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $importantData = important::find($id);

        return view('important.impedit')->with('impdata', $importantData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $impdata = important::find($id);
        $input = $request->all();
        $impdata->update($input);
        return redirect('/important/impnotes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = important::find($id);

        $record->delete();
        return redirect('/important/impnotes');
    }
}
