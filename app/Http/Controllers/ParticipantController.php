<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use Illuminate\Support\Facades\Cookie;

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

    /**
     * Store participant data and set condition in a cookie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'subject_nb'      => 'required|string',
            'subject_nb2'     => 'required|string',
            'subject_code1'   => 'required|string',
            'subject_code2'   => 'required|string',
            'condition'       => 'required|integer',
        ]);

        // Extract the condition from the validated data
        $condition = $validatedData['condition'];

        // Create a new Participant record and get the instance
        $participant = Participant::create($validatedData);

        // Get the id of the inserted participant
        $participantId = $participant->id;

        // Set the condition and id in cookies (valid for 60 minutes)
        $cookieCondition = cookie('condition', $condition, 60);
        $cookieId = cookie('id', $participantId, 60);

        // Redirect to a new page with a success message and set both cookies
        return redirect('/fr/instruction1')
            ->with('success', 'Participant data saved successfully!')
            ->withCookie($cookieCondition)
            ->withCookie($cookieId);
    }

    public function savePracticeData(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'flower_practice' => 'nullable|string',
            'flower2_practice' => 'nullable|string',
            'missedFlower_practice' => 'nullable|string',
            'missedFlower2_practice' => 'nullable|string',
            'draw_practice' => 'nullable|string',
        ]);        

        // Assuming you have a way to identify the participant (e.g., session or cookie)
        // For example, using session:
        $participantId = Cookie::get('id');
        $participantIda = Cookie::get('id');

        if ($participantId) {
            $participant = Participant::find($participantId);

            if ($participant) {
                // Update the participant's data
                $participant->update($validatedData);

                return response()->json(['message' => 'Data saved successfully'.$participantIda ], 200);
            }
        }

        return response()->json(['message' => 'Participant not found'], 404);
    }

    public function saveTaskData(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'flower_task_practice' => 'nullable|string',
            'flower2_task_practice' => 'nullable|string',
            'missedFlower_task_practice' => 'nullable|string',
            'missedFlower2_task_practice' => 'nullable|string',
            'draw_practice' => 'nullable|string',
            'flower_task' => 'nullable|string',
            'flower2_task' => 'nullable|string',
            'missedFlower_task' => 'nullable|string',
            'missedFlower2_task' => 'nullable|string',
            'draw_task' => 'nullable|string',
        ]);        

        // Assuming you have a way to identify the participant (e.g., session or cookie)
        // For example, using session:
        $participantId = Cookie::get('id');

        if ($participantId) {
            $participant = Participant::find($participantId);

            if ($participant) {
                // Update the participant's data
                $participant->update($validatedData);

                return response()->json(['message' => 'Data saved successfully'.$participantId ], 200);
            }
        }

        return response()->json(['message' => 'Participant not found'], 404);
    }
}