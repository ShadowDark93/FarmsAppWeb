<?php

namespace App\Http\Controllers;

use App\Models\Peso;
use Illuminate\Http\Request;

class PesoController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearPeso($id)
    {
        return view('peso.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Peso $peso)
    {
        $request->validate([
            'NombrePesador' => 'required',
            'peso' => 'required',
            'valor' => 'required',
        ]);

        $peso = Peso::create($request->all());

        return redirect()->route('inventario.index')->with('create', 'ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Peso::all()->where('inventories_id', $id);

        if ($animal->count() > 0) {
            if ($id == 0) {
                return view('peso.index_data', compact('animal', 'id'));
            } else {
                return view('peso.index', compact('animal', 'id'));
            }
        } else {
            return view('peso.create', compact('id'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function edit(Peso $peso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peso $peso)
    {
        //
    }

}
