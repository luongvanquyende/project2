<?php

namespace App\Http\Controllers;

use App\settings;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Equipment;
use Carbon\Carbon;

class SettingController extends Controller
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
    public function store(Request $request, $slug)
    {
        $request->validate([
            'watering_time' => 'nullable',
            'amount_of_water' => 'nullable',
            'humidity' => 'nullable',
        ]);

        $equipment = Equipment::whereSlug($slug)->firstOrFail();

        Setting::updateOrCreate([
            'equipment_id' => $equipment->id,
        ],[
            'watering_time' => Carbon::parse($request->get('watering_time')),
            'amount_of_water' => $request->get('amount_of_water'),
            'humidity' => $request->get('humidity'),
        ]);

        return redirect('/equipment/' . $slug)->with('success', 'change equipment setting successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(settings $settings)
    {
        //
    }
}
