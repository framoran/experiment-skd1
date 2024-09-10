<?php

namespace App\Http\Controllers;

use App\Exports\ExperimentsExport;
use Auth;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\App;

class ExperimentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'index_post');
    }

    /**
     * Show the application dashboard.
     */
    public function index($locale, $instructions): View
    {
        App::setLocale($locale);

        if (isset($_GET['Experiment_Id'])){

            $id = $_GET['Experiment_Id'];
            
            // to prevent crashes, check that experiment exists
            $count = DB::table('experiments')->where('id', '=', $id)->count();
            if ($count > 0){
                $data = DB::table('experiments')->where('id', '=', $id)->get()->first();

                $event = $data->event;

                if ($data->event_time < 60000){
                    $practice_length = '65000';
                }else{
                    $practice_length = $data->event_time + 5000;
                }

                $task_length = ($data->event_time * 6) + 5000;
               
                $data = [
                    'stars_points' => $data->stars_points,
                    'collide_rock' => $data->collision_rocks_points,
                    'fire_rock_success' => $data->fired_rocks_points,
                    'fill_fuel' => $data->refuel_points,
                    'speed_g' => $data->vitesse,
                    'time_to_refuel' => $data->event_time,
                    'practice_length' => $practice_length,
                    'task_length' => $task_length,
                    'prediction' => $data->prediction,
                    'postdiction' => $data->postdiction,
                ];
                if (!isset($event) or $event == 1){
                    return view("{$locale}/{$instructions}", $data);
                }else{
                    return view("{$locale}/event_based/{$instructions}", $data);
                }
            }else{
                $data = [
                    'stars_points' => '30',
                    'collide_rock' => '100',
                    'fire_rock_success' => '30',
                    'fill_fuel' => '300',
                    'speed_g' => '2',
                    'time_to_refuel' => '20',
                    'practice_length' => '65000',
                    'task_length' => '370000',
                    'prediction' => '0',
                    'postdiction' => '0',
                ];

                return view("{$locale}/{$instructions}", $data);
            }
        // if cookie
        }else if (isset($_COOKIE['experimentId'])){

            $id = $_COOKIE['experimentId'];
        
            // to prevent crashes, check that experiment exists
            $count = DB::table('experiments')->where('id', '=', $id)->count();
            if ($count > 0){
                $data = DB::table('experiments')->where('id', '=', $id)->get()->first();
                $event = $data->event;

                /*if ($data->event_time < 60000){
                    $practice_length = '65000';
                }else{
                    $practice_length = $data->event_time + 5000;
                }*/

                $practice_length = $data->event_time+5000;

                $task_length = ($data->event_time * 6)+5000;
            
                $data = [
                    'stars_points' => $data->stars_points,
                    'collide_rock' => $data->collision_rocks_points,
                    'fire_rock_success' => $data->fired_rocks_points,
                    'fill_fuel' => $data->refuel_points,
                    'speed_g' => $data->vitesse,
                    'time_to_refuel' => $data->event_time,
                    'practice_length' => $practice_length,
                    'task_length' => $task_length,
                    'prediction' => $data->prediction,
                    'postdiction' => $data->postdiction,
                ];
                
                if (!isset($event) or $event == 1){
                    return view("{$locale}/{$instructions}", $data);
                }else{
                    return view("{$locale}/event_based/{$instructions}", $data);
                }
            
            // if experiment do not exists => demo
            }else{
                $data = [
                    'stars_points' => '30',
                    'collide_rock' => '100',
                    'fire_rock_success' => '30',
                    'fill_fuel' => '300',
                    'speed_g' => '2',
                    'time_to_refuel' => '60000',
                    'practice_length' => '65000',
                    'task_length' => '370000',
                    'prediction' => '0',
                    'postdiction' => '0',
                ];

                return view("{$locale}/{$instructions}", $data);
            }

        }else{
            $data = [
                'stars_points' => '30',
                'collide_rock' => '100',
                'fire_rock_success' => '30',
                'fill_fuel' => '300',
                'speed_g' => '2',
                'time_to_refuel' => '60000',
                'practice_length' => '65000',
                'task_length' => '370000',
                'prediction' => '0',
                'postdiction' => '0',
            ];
            return view("{$locale}/{$instructions}", $data);
        }      
  
    }

    public function index_post($locale, $instructions): View
    {
      
        App::setLocale($locale);

        if (isset($_GET['Experiment_Id'])){

            $id = $_GET['Experiment_Id'];
            
            // to prevent crashes, check that experiment exists
            $count = DB::table('experiments')->where('id', '=', $id)->count();
            if ($count > 0){
                $data = DB::table('experiments')->where('id', '=', $id)->get()->first();

                $event = $data->event;

                if ($data->event_time < 60000){
                    $practice_length = '65000';
                }else{
                    $practice_length = $data->event_time + 5000;
                }

                $task_length = ($data->event_time * 6) + 5000;
               
                $data = [
                    'stars_points' => $data->stars_points,
                    'collide_rock' => $data->collision_rocks_points,
                    'fire_rock_success' => $data->fired_rocks_points,
                    'fill_fuel' => $data->refuel_points,
                    'speed_g' => $data->vitesse,
                    'time_to_refuel' => $data->event_time,
                    'practice_length' => $practice_length,
                    'task_length' => $task_length,
                    'prediction' => $data->prediction,
                    'postdiction' => $data->postdiction,
                ];
                if (!isset($event) or $event == 1){
                    return view("{$locale}/{$instructions}", $data);
                }else{
                    return view("{$locale}/event_based/{$instructions}", $data);
                }
            }else{
                $data = [
                    'stars_points' => '30',
                    'collide_rock' => '100',
                    'fire_rock_success' => '30',
                    'fill_fuel' => '300',
                    'speed_g' => '2',
                    'time_to_refuel' => '20',
                    'practice_length' => '65000',
                    'task_length' => '370000',
                    'prediction' => '0',
                    'postdiction' => '0',
                ];

                return view("{$locale}/{$instructions}", $data);
            }
        // if cookie
        }else if (isset($_COOKIE['experimentId'])){

            $id = $_COOKIE['experimentId'];
        
            // to prevent crashes, check that experiment exists
            $count = DB::table('experiments')->where('id', '=', $id)->count();
            if ($count > 0){
                $data = DB::table('experiments')->where('id', '=', $id)->get()->first();
                $event = $data->event;

                /*if ($data->event_time < 60000){
                    $practice_length = '65000';
                }else{
                    $practice_length = $data->event_time + 5000;
                }*/

                $practice_length = $data->event_time + 5000;

                $task_length = ($data->event_time * 6) + 5000;
            
                $data = [
                    'stars_points' => $data->stars_points,
                    'collide_rock' => $data->collision_rocks_points,
                    'fire_rock_success' => $data->fired_rocks_points,
                    'fill_fuel' => $data->refuel_points,
                    'speed_g' => $data->vitesse,
                    'time_to_refuel' => $data->event_time,
                    'practice_length' => $practice_length,
                    'task_length' => $task_length,
                    'prediction' => $data->prediction,
                    'postdiction' => $data->postdiction,
                ];
                
                if (!isset($event) or $event == 1){
                    return view("{$locale}/{$instructions}", $data);
                }else{
                    return view("{$locale}/event_based/{$instructions}", $data);
                }
            
            // if experiment do not exists => demo
            }else{
                $data = [
                    'stars_points' => '30',
                    'collide_rock' => '100',
                    'fire_rock_success' => '30',
                    'fill_fuel' => '300',
                    'speed_g' => '2',
                    'time_to_refuel' => '60000',
                    'practice_length' => '65000',
                    'task_length' => '370000',
                    'prediction' => '0',
                    'postdiction' => '0',
                ];

                return view("{$locale}/{$instructions}", $data);
            }

        }else{
            $data = [
                'stars_points' => '30',
                'collide_rock' => '100',
                'fire_rock_success' => '30',
                'fill_fuel' => '300',
                'speed_g' => '2',
                'time_to_refuel' => '60000',
                'practice_length' => '65000',
                'task_length' => '370000',
                'prediction' => '0',
                'postdiction' => '0',
            ];
            return view("{$locale}/{$instructions}", $data);
        }  
           
    }
    
    public function new(): View
    {
        return view('new');
    }

    public function edit($id): View
    {
        return view('edit');
    }

    public function create(Request $request): RedirectResponse
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
        $experimentGroup = htmlspecialchars($request->input('experimentGroup'));
        $event = htmlspecialchars($request->input('event'));
        $prediction = htmlspecialchars($request->input('prediction'));
        $postdiction = htmlspecialchars($request->input('postdiction'));

        // Ensure that empty values are set to baseline

        if ($event == '') {
            $event = 1;
        }

        if ($experimentGroup == '') {
            $experimentGroup = 1;
        }

        if ($prediction == '') {
            $prediction = 0;
        }

        if ($postdiction == '') {
            $postdiction = 0;
        }

        // Current time
        $timestamp = date('Y-m-d H:i:s');

        if ($lang == 'de') {
            $link = 'de/instruction1?Experiment_Id=';
            $lang = 'German';
        } elseif ($lang == 'en') {
            $link = 'en/instruction1?Experiment_Id=';
            $lang = 'English';
        } elseif ($lang == 'it') {
            $link = 'it/instruction1?Experiment_Id=';
            $lang = 'Italian';
        } elseif ($lang == 'nl') {
            $link = 'nl/instruction1?Experiment_Id=';
            $lang = 'Dutch';
        } elseif ($lang == 'zh') {
            $link = 'zh/instruction1?Experiment_Id=';
            $lang = 'Chinese';
        }elseif ($lang == 'fa') {
            $link = 'fa/instruction1?Experiment_Id=';
            $lang = 'Persian';
        }elseif ($lang == 'fa') {
            $link = 'tr/instruction1?Experiment_Id=';
            $lang = 'Turkish';
        }elseif ($lang == 'fi') {
            $link = 'fi/instruction1?Experiment_Id=';
            $lang = 'Finnish';
        }else {
            $link = 'fr/instruction1?Experiment_Id=';
            $lang = 'French';
        }

        if (Auth::user()->validate == 1) {

            // insert experiment into database
            $data = ['user_id' => $user_id, 'experiment' => $experimentName, 'experimentGroup' => $experimentGroup, 'link' => $link, 'lang' => $lang, 'prediction' => $prediction, 'postdiction' => $postdiction, 'event' =>$event, 'created_at' => $timestamp];
            DB::table('experiments')->insert($data);

            // complete link with experiment id
            $id = DB::table('experiments')
                ->where('user_id', '=', Auth::user()->id)
                ->orderBy('created_at', 'DESC')
                ->value('id');

            $link = $link.$id;

            // modify link in function of the experiment Group
            if ($experimentGroup == 2 || $experimentGroup == 3) {
                $link = $link.'&&eui=';
            }

            // if group == 3 or 4 -> set a redirection link
            if ($experimentGroup == 3 || $experimentGroup == 4) {
                $redirectionLink = htmlspecialchars($request->input('redirectionLink'));
                DB::update('update experiments set first_link = ? where id = ?', [$redirectionLink, $id]);
            }

            DB::update('update experiments set link = ? where id = ?', [$link, $id]);

            return redirect('home?q=experiments&resultCreate=success');

        } else {

            return redirect('home?q=experiments&result=error');

        }

    }

    public function update(): View
    {
        return view('update');
    }

    public function update_prediction($locale, $id): View
    {
        DB::table('experiments')->where('id', $id)->update([
            
            'prediction' => $request->input('prediction'),
        ]);

        return view("{$locale}/intertask", $data);

    }

    public function update_postiction($locale, $id): View
    {
        DB::table('experiments')->where('id', $id)->update([
            
            'prediction' => $request->input('prediction'),
        ]);

        return view("{$locale}/{$instructions}", $data);

    }    

    public function delete(Request $request): RedirectResponse
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

            return redirect('home?q=experiments&resultDel=success');

        } else {

            return redirect('home?result=error');

        }

    }

    public function update_redirection_link(Request $request): RedirectResponse
    {

        $experiment_id = htmlspecialchars($request->input('experiment_id'));
        $redirection_link = htmlspecialchars($request->input('redirection_link'));

        $redirection_link = ltrim($redirection_link, 'url:');

        // Check whether it is the owner of the data
        $experiment_owner = DB::table('experiments')
            ->where('id', '=', $experiment_id)
            ->value('user_id');

        if ($experiment_owner == Auth::user()->id) {

            DB::update('update experiments set first_link = ? where id = ?', [$redirection_link, $experiment_id]);

        } else {

            return redirect('home?q=experiments&error=notowner');

        }

    }

    public function export(Request $request)
    {
        // Check whether it is the owner of the data
        $experiment_owner = DB::table('experiments')
            ->where('id', '=', $_GET['experiment'])
            ->value('user_id');

        if ($experiment_owner == Auth::user()->id) {
            return Excel::download(new ExperimentsExport,
                'data.xlsx'
            );
        }

        return redirect('home?q=experiments&result=success');

    }
}
