<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::all();
        $zones = Zone::all();

        return view('equipment.index', compact(['equipments', 'zones']));
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'zone_id' => 'required',
            'token' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);

        Equipment::create([
            'name' => $request->get('name'),
            'zone_id' => $request->get('zone_id'),
            'slug' => Str::slug($request->get('name'), '-'),
            'token' => $request->get('token'),
            'image' => $request->get('image'),
            'description' => $request->get('description'),
        ]);

        return redirect()->action('EquipmentController@index')->with('success', 'new equipment created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(equipment $equipment)
    {
        //
    }
}
