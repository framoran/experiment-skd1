<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class ParticipantController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'subject_nb' => 'required|string',
            'subject_nb2' => 'required|string',
            'gender' => 'required|integer',
            'gender2' => 'required|integer',
            'age' => 'required|integer',
            'age2' => 'required|integer',
            'laterality' => 'required|integer',
            'laterality2' => 'required|integer',
            'condition' => 'required|integer',
        ]);

        // Create a new Participant record
        Participant::create($validatedData);

        // Redirect to a new page or show a success message
        return redirect('/fr/instruction1')->with('success', 'Participant data saved successfully!');
    }
}
