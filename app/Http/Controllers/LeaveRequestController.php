<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // Fetch leave requests for the current user
    $leaveRequests = LeaveRequest::where('user_id', auth()->id())->get();

    // Pass leave requests to the view
    return view('leave_request', compact('leaveRequests'));
    }

    /**
     * Submit leave request.
     */
    public function submit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'details' =>'string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            // Add validation rules for other form fields as needed
        ]);

        // Create a new LeaveRequest instance and store it in the database
        LeaveRequest::create([
            'user_id' => auth()->id(), // Get the authenticated user's ID
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
            'details' => 'string',
            // Add validation rules for other form fields as needed
        ]);

        // Create a new LeaveRequest instance
        $leaveRequest = new LeaveRequest();
        $leaveRequest->user_id = auth()->id(); // Get the authenticated user's ID
        $leaveRequest->department_id = $request->user()->department_id; // Assuming department_id is stored in the user model
        $leaveRequest->start_date = $validatedData['start_date'];
        $leaveRequest->end_date = $validatedData['end_date'];
        $leaveRequest->details = $validatedData['details'];
        // Assign other form field values to corresponding database columns

        // Save the leave request
        $leaveRequest->save();

        // Redirect back with success message or to any desired route
        echo '<script>alert("Leave request submitted successfully. OK."); window.location.href = "'.route('dashboard').'";</script>';
    }
}
