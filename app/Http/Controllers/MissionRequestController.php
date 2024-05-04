<?php
namespace App\Http\Controllers;

use App\Models\MissionRequest;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class MissionRequestController extends Controller
{
    // Other methods...

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch mission requests for the current user
        $missionRequests = MissionRequest::where('user_id', auth()->id())->get();

        // Pass mission requests to the view
        return view('mission_request', compact('missionRequests'));
    }

    /**
     * Submit mission request.
     */
    public function submit(Request $request)
    {
       // Validate the form data
       $validatedData = $request->validate([
        'details' =>'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        // Add validation rules for other form fields as needed
    ]);

    // Create a new MissionRequest instance and store it in the database
        MissionRequest::create([
        'start_date' => $validatedData['start_date'],
        'end_date' => $validatedData['end_date'],
        // Assign other form field values to corresponding database columns
    ]);

      }

    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'details' => 'required|string',

            // Add more validation rules as needed
        ]);

        // Create a new mission request instance
        $missionRequest = new MissionRequest();
        $missionRequest->user_id = auth()->user()->id; // Assuming the user is authenticated
        $missionRequest->department_id = $request->user()->department_id; // Assuming department_id is stored in the user model
        $missionRequest->details = $validatedData['details'];
        $missionRequest->start_date = $validatedData['start_date'];
        $missionRequest->end_date = $validatedData['end_date'];
        $missionRequest->status = 'pending'; // Set default status
        // Set approved_by if needed

        // Save the mission request
        $missionRequest->save();



        // Redirect back with success message

        //return redirect('dashboard')->with('success', 'Mission request submitted successfully.');
        echo '<script>alert("Mission request submitted successfully. OK."); window.location.href = "'.route('dashboard').'";</script>';
    }

}
