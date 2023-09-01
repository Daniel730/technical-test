<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Inspection;
use App\Models\Turbine;
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

    public function edit(int $id)
    {
        return view('turbine.edit', ['id' => $id]);
    }

    public function new()
    {
        return view('turbine.new');
    }

    public function store(Request $req)
    {
        $turbine = new Turbine();

        $turbine->location = serialize([
            'latitude' => $req->input('latitude'),
            'longitude' => $req->input('longitude')
        ]);

        $turbine->user_id = auth()->user()->id;

        $turbine->save();

        $components = Component::get();

        foreach ($components as $component) {
            $inspection = new Inspection();

            $inspection->grade = 1;
            $inspection->turbine_id = $turbine->id;
            $inspection->component_id = $component->id;

            $inspection->save();
        }

        return redirect('home');
    }

    public function update(Request $req)
    {
        $turbine = Turbine::find($req->input('id'));

        $turbine->update([
            'location' => serialize([
                'latitude' => $req->input('latitude'),
                'longitude' => $req->input('longitude')
            ])
        ]);

        return redirect('home');
    }
}
