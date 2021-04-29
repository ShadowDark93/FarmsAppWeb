<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmController extends Controller
{


    public function __invoke()
    {

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farms = Farm::all()->where('users_id', Auth()->user()->id);
        $count = $farms->count();

        return view('farm.index', compact('farms', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Location' => 'required',
            'Name' => 'required',
        ]);

        $farm = new Farm();

        $farm->users_id = Auth()->user()->id;
        $farm->AdminName = $request->get('AdminName');
        $farm->Name = $request->get('Name');
        $farm->Location = $request->get('Location');
        $farm->Phone = $request->get('Phone');
        $farm->AdminName = $request->get('AdminName');

        $farm->save();

        return redirect()->route('farm.index')->with('create', 'ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {
        return view('farm.edit', compact('farm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm $farm)
    {
        $request->validate([
            'Location' => 'required',
            'Name' => 'required',
        ]);

        $farm->update($request->all());

        return redirect()->route('farm.index')->with('edited','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
        //
    }

    public function disable($id){
        $farm = Farm::FindOrFail($id);
        $farm->state='0';
        $farm->save();

        return redirect()->route('farm.index')->with('disable','ok');
    }

    public function enable($id){
        $farm = Farm::FindOrFail($id);
        $farm->state='1';
        $farm->save();

        return redirect()->route('farm.index')->with('enable','ok');
    }
}
