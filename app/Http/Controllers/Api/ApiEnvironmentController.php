<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\Environment;
use App\Http\Resources\EnvironmentResource;
use App\Http\Controllers\Controller;

class ApiEnvironmentController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'temperature' => 'required',
            'humidity' => 'required',
            'equipment_id' => 'required',
        ]);

        $environment = Environment::create([
            'temperature' => $request->get('temperature'),
            'humidity' => $request->get('humidity'),
            'equipment_id' => $request->get('equipment_id'),
        ]);
        
        return response(['environment' => new EnvironmentResource($environment), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\environments  $environments
     * @return \Illuminate\Http\Response
     */
    public function show(environments $environments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\environments  $environments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, environments $environments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\environments  $environments
     * @return \Illuminate\Http\Response
     */
    public function destroy(environments $environments)
    {
        //
    }
}