<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Setting;
use App\Models\Zone;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::with(['zone', 'setting', 'histories'])->get();
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
            'zone_id' => 'nullable',
            'token' => 'required',
            'description' => 'nullable|max:50',
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
    public function show($slug)
    {
        
        $equipment = Equipment::whereSlug($slug)->firstOrFail();
        $setting = Setting::where('equipment_id', $equipment->id)->first();
        $zones = Zone::all();

        return view('equipment.setting', compact('equipment', 'setting', 'zones'));
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
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable|max:50',
            'image' => 'nullable',
            'zone_id' => 'nullable'
        ]);
        $newSlug = Str::slug($request->get('name'), '-');
        Equipment::whereSlug($slug)->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'slug' => Str::slug($request->get('name'), '-'),
            'image' => $request->get('image'),
            'zone_id' => $request->get('zone_id'),
        ]);

        return redirect('/equipment/' . $newSlug)->with('success', 'equipment update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $equipment = Equipment::whereSlug($slug);
        $equipment->delete();

        return redirect()->action('EquipmentController@index')->with('success', 'equipment deleted successfully');
    }
}
