<?php
namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    // Other methods...

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leave_request'); // Assuming you have a blade file named 'leave_request.blade.php'

    }

    /**
     * Submit leave request.
     */
    public function submit(Request $request)
    {

       // Validate the form data
       $validatedData = $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        // Add validation rules for other form fields as needed
    ]);

    // Create a new LeaveRequest instance and store it in the database
        LeaveRequest::create([
        'start_date' => $validatedData['start_date'],
        'end_date' => $validatedData['end_date'],
        // Assign other form field values to corresponding database columns
    ]);

    // Optionally, you can redirect the user after successful form submission
    return redirect()->back()->with('success', 'Leave request submitted successfully.');
        // Logic to handle form submission for leave request
    }
}
