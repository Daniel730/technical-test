<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Inspection;
use Illuminate\Http\Request;

class InspectionController extends Controller
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

    public function new(int $turbine_id)
    {
        return view(
            'inspection.new',
            [
                "components" => Component::get(),
                "turbine_id" => $turbine_id
            ]
        );
    }

    function store(Request $req)
    {
        $componentIds = $req->input('component_ids');
        $grades = $req->input('grades');
        $turbineId = $req->input('turbine_id');

        // Could not finish array_map
        // I was wasting too much time at this, so I've decided to go with a simpler approach
        // $upsertArray = array_map(function ($value, $key) {
        //     return [
        //         'turbine_id' => $turbineId,
        //         "component_id" => $value,
        //         'grade' => $grades[$key]
        //     ];
        // }, $componentIds, array_keys($componentIds));

        foreach ($componentIds as $key => $componentId) {
            Inspection::updateOrCreate([
                'turbine_id' => $turbineId,
                'component_id' => $componentId,
            ], ['grade' => $grades[$key]]);

            // $upsertArray[] = [
            //     'turbine_id' => $turbineId,
            //     'component_id' => $componentId,
            //     'grade' => $grades[$key]
            // ];
        }

        // This would have been a better approach, but for what I understood
        // the columns of search should be unique (in this case turbine_id and component_id)

        // Inspection::upsert(
        //     $upsertArray,
        //     ['turbine_id', 'component_id'],
        //     ['grade']
        // );

        return redirect('home');
    }
}
