<?php

namespace App\Http\Controllers;

use App\histories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\History;
use App\Models\Equipment;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $histories = History::with('user', 'equipment')->get();
        
        return view('history.index', compact('histories'));
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
            'status' => 'nullable',
        ]);

        Equipment::whereSlug($slug)->update([
            'status' => $request->get('status') ? 1 : 0,
        ]);

        $equipment = Equipment::whereSlug($slug)->first();

        if($request->get('status')){
            History::create([
                'equipment_id' => $equipment->id,
                'user_id' => Auth::user()->id,
                'status' => $request->get('status') ? '1' : '0',
            ]);
        }
        

        $turn = $request->get('status') ? 'Turn on' : 'Turn off';

        return redirect('/equipment/' . $slug)->with('success', $turn . ' equipment successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\histories  $histories
     * @return \Illuminate\Http\Response
     */
    public function show(histories $histories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\histories  $histories
     * @return \Illuminate\Http\Response
     */
    public function edit(histories $histories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\histories  $histories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, histories $histories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\histories  $histories
     * @return \Illuminate\Http\Response
     */
    public function destroy(histories $histories)
    {
        //
    }
}
