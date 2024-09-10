<?php

namespace App\Http\Controllers;

use App\Helpers\GameHelper;
use DB;
use Illuminate\View\View;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     */
    public function insert(): View
    {

        $helper = new GameHelper;
        $helper->insert();

        $experimentId = htmlspecialchars($_COOKIE['experimentId']);

        // get redirection link
        $redirection_link = DB::table('experiments')
            ->where('id', '=', $experimentId)
            ->value('first_link');

        if (isset($_COOKIE['eui'])) {
            $eui = htmlspecialchars($_COOKIE['eui']);
        } else {
            $eui = null;
        }

        return view('/instruction7', ['redirection_link' => $redirection_link, 'user_id' => $eui]);

    }

    public function insert_data($lang): View
    {

        $helper = new GameHelper;
        $helper->insert();

        $experimentId = htmlspecialchars($_COOKIE['experimentId']);

        // get redirection link
        $redirection_link = DB::table('experiments')
            ->where('id', '=', $experimentId)
            ->value('first_link');

        if (isset($_COOKIE['eui'])) {
            $eui = htmlspecialchars($_COOKIE['eui']);
        } else {
            $eui = null;
        }

        return view('/'.$lang.'/instruction7', ['redirection_link' => $redirection_link, 'user_id' => $eui]);

    }

}
