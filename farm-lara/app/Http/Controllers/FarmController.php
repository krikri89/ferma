<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;



class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farms = Farm::orderBy('farm')->get();
        // $farms = Farm::all();

        return view('animals.index', ['farms' => $farms]);
    }

    /**
     * Show the create for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $farm = new Farm;

        $farm->farm = $request->create_animal_input;
        $farm->weight = $request->create_weight ?? 'need to weight';
        $farm->save();
        return redirect()->route('animals-index')->with('success', 'Well done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(int $farmId)
    {
        $farm = Farm::where('id', $farmId)->first();

        return view('animals.show', ['farm' => $farm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {
        return view('animals.edit', ['farm' => $farm]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm $farm)
    {
        $farm->farm = $request->create_animal_input;
        $farm->weight = $request->create_weight ?? 'need to weight';

        $farm->save();
        return redirect()->route('animals-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
        $farm->delete();
        return redirect()->route('animals-index')->with('deleted', 'oh nooo!');
    }
}
