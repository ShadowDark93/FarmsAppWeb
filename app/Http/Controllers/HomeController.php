<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Inventory;
use App\Models\User;
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
        $superadmin = User::all();
        $users = User::all()->where('person_types_id',3);
        $farms = Farm::all()->where('users_id', Auth()->user()->id);
        $invent = Inventory::all()->where('users_id', Auth()->user()->id);

        $propiedades = $farms->count();
        $inventario = $invent->count();

        if ($auth == '1') {
            $users = $superadmin;
            return view('admon.home_admin', compact('users'));
        } elseif( $auth == '2') {
            return view('admon.home_admin', compact('users', 'farms', 'propiedades', 'inventario'));
        }else {
            return view('usr.home_user', compact('users', 'farms', 'propiedades', 'inventario'));
        }
    }

     public function activarUser($id)
    {
        $user = User::FindOrFail($id);
        $user->estado = '1';
        $user->save();
        return redirect()->route('home')->with('enable', 'ok');
    }

    public function desactivarUser($id)
    {
        $user = User::FindOrFail($id);
        $user->estado = '0';
        $user->save();
        return redirect()->route('home')->with('disable', 'ok');
    }
}
