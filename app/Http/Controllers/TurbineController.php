<?php

namespace App\Http\Controllers;

use App\Models\Turbine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TurbineController extends Controller
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

    public function edit()
    {
        return view('turbine.edit');
    }

    public function new()
    {
        return view('turbine.new');
    }

    function store(Request $req)
    {
        $turbine = new Turbine;

        $turbine->location = serialize([
            'latitude' => $req->input('latitude'),
            'longitude' => $req->input('longitude')
        ]);

        $turbine->user_id = auth()->user()->id;

        $turbine->save();

        return redirect('home');
    }
}
