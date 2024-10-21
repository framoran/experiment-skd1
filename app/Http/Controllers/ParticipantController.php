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

        // Create a new Participant record
        $participant = Participant::create($validatedData);

        // Get the ID of the inserted participant
        $participantId = $participant->id;

        // Set the condition and ID in cookies (valid for 60 minutes)
        $cookieCondition = cookie('condition', $condition, 60);
        $cookieId = cookie('participant_id', $participantId, 60); // Save participant ID in cookie with key 'participant_id'

        // Redirect to a new page with a success message and set both cookies
        return redirect('/fr/instruction1')
            ->with('success', 'Participant data saved successfully!')
            ->withCookie($cookieCondition)
            ->withCookie($cookieId);
    }

    /**
     * Save task data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveTaskData(Request $request)
    {
        // Retrieve the task data from the request
        $taskData = [
            'flower_practice' => $request->input('flower_practice'),
            'flower2_practice' => $request->input('flower2_practice'),
            'missedFlower_practice' => $request->input('missedFlower_practice'),
            'missedFlower2_practice' => $request->input('missedFlower2_practice'),
            'draw_practice' => $request->input('draw_practice'),
            'flower_task' => $request->input('flower_task'),
            'flower2_task' => $request->input('flower2_task'),
            'missedFlower_task' => $request->input('missedFlower_task'),
            'missedFlower2_task' => $request->input('missedFlower2_task'),
            'draw_task' => $request->input('draw_task'),
        ];

        // Retrieve participant ID from cookie
        $participantId = Cookie::get('participant_id');

        if ($participantId) {
            // Find the participant by the ID stored in the cookie
            $participant = Participant::find($participantId);

            if ($participant) {
                // Update the participant's data
                $participant->update($taskData);

                return response()->json([
                    'message' => 'Data saved successfully',
                    'participant_id' => $participantId
                ], 200);
            }
        }

        // Return an error response if the participant is not found or cookie is missing
        return response()->json(['message' => 'Error: Participant not found or invalid data'], 202);
    }

}
