<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{

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
        $data = Inventory::all()->where('users_id', Auth()->user()->id);

        return view('inventory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $farms = Farm::all()->where('users_id', Auth()->user()->id);
        return view('inventory.create', compact('farms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Inventory $inventory)
    {
        $request->validate([
            'InternalCode' => 'required',
            'Category' => 'required',
            'Third' => 'required',
            'Peso' => 'required',
            'valor' => 'required',
        ]);

        $inventory = Inventory::create($request->all());

        return redirect()->route('inventario.index')->with('created', 'ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::findorfail($id);
        $farms = Farm::all()->where('users_id', Auth()->user()->id);

        return view('inventory.edit', compact('inventory', 'farms'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'InternalCode' => 'required',
            'Category' => 'required',
            'Third' => 'required',
            'Peso' => 'required',
            'valor' => 'required',
        ]);

        $inventory = Inventory::find($id);
        $inventory->InternalCode=$request->get('InternalCode');
        $inventory->farms_id=$request->get('farms_id');
        $inventory->Category=$request->get('Category');
        $inventory->Sex=$request->get('Sex');
        $inventory->Third=$request->get('Third');
        $inventory->ThirdName=$request->get('ThirdName');
        $inventory->Peso=$request->get('Peso');
        $inventory->valor=$request->get('valor');
        $inventory->state=$request->get('state');
        $inventory->save();

        return redirect()->route('inventario.index')->with('edited','ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
