<?php

namespace App\Http\Controllers;

use App\Models\Turbine;

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
        $turbines = Turbine::with('inspection')
            ->join('inspections', 'inspections.turbine_id', 'turbines.id')
            ->orderBy('inspections.updated_at', "DESC")
            ->get();

        return view('home', [
            'turbines' => $turbines
        ]);
    }
}
