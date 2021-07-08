<?php

namespace App\Http\Controllers;

use App\Models\Peso;
use Illuminate\Http\Request;

class PesoController extends Controller
{
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
    public function create()
    {
        //
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
           'Peso' => 'required',
           'valor' => 'required'
        ]);

        
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
        
        if ($animal->count()>0) {
            return view('peso.index', compact('animal'));
        } else {
            return view('peso.create', compact('animal'));
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