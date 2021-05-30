<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Zone;
use Carbon\Carbon;

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
        $start = Carbon::now()->subDays(12);

        foreach (range(1, 12) as $day) {
            $dates[] = $start->copy()->addDays($day)->format('j F');
        }
        $dates = str_replace('"', "'", json_encode($dates));
        $total_equipment = Equipment::All()->count();
        $total_zone = Zone::All()->count();
        $number_active = Equipment::where('status', 1)->count();

        return view('dashboard', compact(['total_equipment', 'total_zone', 'number_active', 'dates']));
    }
}
