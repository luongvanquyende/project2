<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Zone;
use Illuminate\Support\Str;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::with('equipment')->get();
        $user = Auth::user();

        return view('zone.index', compact(['zones', 'user']));
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
            'description' => 'nullable',
            'image' => 'nullable',
        ]);

        Zone::create([
            'name' => $request->get('name'),
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->get('name'), '-'),
            'image' => $request->get('image'),
            'description' => $request->get('description'),
        ]);

        return redirect()->action('ZoneController@index')->with('success', 'new zone created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\zones  $zones
     * @return \Illuminate\Http\Response
     */
    public function show(zones $zones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\zones  $zones
     * @return \Illuminate\Http\Response
     */
    public function edit(zones $zones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\zones  $zones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, zones $zones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\zones  $zones
     * @return \Illuminate\Http\Response
     */
    public function destroy(zones $zones)
    {
        //
    }
}
