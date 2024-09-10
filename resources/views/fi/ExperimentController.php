<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

class ExperimentController extends Controller
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
    public function new()
    {
        return view('new');
    }

    public function create(Request $request)
    {

        $validated = $request->validate([
            'experimentName' => 'required|max:35',
            'experimentLang' => 'required|not_in:-- Select --',
            // 'experimentType' => 'required|max:35',
            // 'experimentCogTask' => 'required|max:35',
        ]);

        // data
        $user_id = Auth::user()->id;

        $experimentName = htmlspecialchars($request->input('experimentName'));
        $lang = htmlspecialchars($request->input('experimentLang'));

        // Current time
        $timestamp = date('Y-m-d H:i:s');

        $link = '/instruction1?Experiment_Id=';

        if (Auth::user()->validate == 1) {

            // insert experiment into database
            $data = ['user_id' => $user_id, 'experiment' => $experimentName, 'type' => 1, 'link' => $link, 'lang' => $lang, 'created_at' => $timestamp];
            DB::table('experiments')->insert($data);

            // complete link with experiment id
            $id = DB::table('experiments')
                ->where('user_id', '=', Auth::user()->id)
                ->orderBy('created_at', 'DESC')
                ->value('id');

            $link = $link.$id;

            DB::update('update experiments set link = ? where id = ?', [$link, $id]);

            return redirect('home?resultCreate=success');

        } else {

            return redirect('home?result=error');

        }

    }

    public function update()
    {
        return view('update');
    }

    public function delete(Request $request)
    {
        $Experiment_Id = htmlspecialchars($request->input('Experiment_Id'));

        $user_id = DB::table('experiments')
            ->where('id', '=', $Experiment_Id)
            ->value('user_id');

        // check whether user is owner of the Experiment
        if ($user_id == Auth::user()->id) {

            DB::table('experiments')
                ->where('id', '=', $Experiment_Id)
                ->delete();

            return redirect('home?resultDel=success');

        } else {

            return redirect('home?result=error');

        }

    }
}
