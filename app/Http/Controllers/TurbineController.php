<?php

namespace App\Http\Controllers;

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
    public function index(int $id)
    {
        echo $id;
        return view('turbine.index');
    }

    public function edit()
    {
        return view('turbine.edit');
    }

    public function new()
    {
        return view('turbine.new');
    }
}
