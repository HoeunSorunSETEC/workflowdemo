<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<form action="{{ route('leave_request.store') }}" method="POST">
    @csrf
    <fieldset>
        <legend>Leave Request Form</legend>

        <!-- Add form fields here -->
        <label for="start_date">Start Date: </label>
        <input type="date" name="start_date" id="start_date" placeholder="DD-MM-YYYY" required>
        <label for="end_date">End Date: </label>
        <input type="date" name="end_date" id="end_date" placeholder="DD-MM-YYYY" required>
        <textarea name="details" placeholder="Details (optional)"></textarea>
        <!-- Add more form fields as needed -->

        <button type="submit">Submit</button>
    </fieldset>
</form>


<hr>
@if ($leaveRequests->isNotEmpty())
    <h2>History</h2>
    <table style="padding:20px;">
        <thead>
            <tr>
                <th style="color: white;">Leave Details</th>
                <th style="color: white;">Start Date</th>
                <th style="color: white;">End Date</th>
                <th style="color: white;">Status</th>
                <th style="color: white;">Approve By</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($leaveRequests as $leaveRequest)
                <tr>
                    <td style="color: white;">{{ $leaveRequest->details }}</td>
                    <td style="color: white;">{{ $leaveRequest->start_date }}</td>
                    <td style="color: white;">{{ $leaveRequest->end_date }}</td>
                    <td style="color: white;">{{ $leaveRequest->status }}</td>
                    <td style="color: white;">{{ $leaveRequest->approved_by }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No leave requests found.</p>
@endif
