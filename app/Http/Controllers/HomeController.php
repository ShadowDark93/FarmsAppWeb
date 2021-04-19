<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $auth = Auth()->user()->person_types_id;
        $users = User::all();
        $farms= Farm::all()->where('users_id', Auth()->user()->id);
        $invent= Inventory::all()->where('users_id',  Auth()->user()->id);

        $propiedades=$farms->count();
        $inventario=$invent->count();

        if ($auth=='1' or $auth=='2') {
            return view('home_admin', compact('users'));
        }else{
            return view('home_user', compact('users', 'farms', 'propiedades', 'inventario'));
        }

    }

}
