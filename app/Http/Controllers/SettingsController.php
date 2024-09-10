<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'index_post');
    }
    
    public function create(Request $request, $id)
    {
        $request->validate([
            'vitesse' => 'required|integer|min:1|max:4',
            'stars_points' => 'required|integer|min:0|max:500',
            'collision_rocks_points' => 'required|integer|min:0|max:500',
            'fired_rocks_points' => 'required|integer|min:0|max:500',
            'refuel_points' => 'required|integer|min:0|max:2000',
            'event_time' => 'required|integer|min:0|max:120000',
        ]);

        DB::table('experiments')->where('id', $id)->update([
            'vitesse' => $request->input('vitesse'),
            'stars_points' => $request->input('stars_points'),
            'collision_rocks_points' => $request->input('collision_rocks_points'),
            'fired_rocks_points' => $request->input('fired_rocks_points'),
            'refuel_points' => $request->input('refuel_points'),
            'event_time' => $request->input('event_time'),
            'prediction' => $request->input('prediction') ?? 0,
            'postdiction' => $request->input('postdiction') ?? 0,
            'first_link' => $request->input('first_link'),
            'event' => $request->input('event') ?? 0,
        ]);

        return redirect('/settings/edit/'.$id.'?settingsUpdate=success');
      }

    public function edit($id)
    {
        $experiment = DB::table('experiments')->where('id', $id)->first();
        
        return view('settings.edit', compact('experiment'));
    }
}
