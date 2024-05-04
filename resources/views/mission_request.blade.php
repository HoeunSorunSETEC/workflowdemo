<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<form action="{{ route('mission_request.store') }}" method="POST">
    @csrf
    <fieldset>
        <legend>Mission Request Form</legend>

        <!-- Add form fields here -->
        <textarea name="details" placeholder="Mission Details" required></textarea>
        <input type="date" name="start_date" id="start_date" placeholder="Start Date" required>
        <input type="date" name="end_date" id="end_date" placeholder="End Date" required>
        <!-- Add more form fields as needed -->

        <button type="submit">Submit</button>
    </fieldset>
</form>

<hr>
@if ($missionRequests->isNotEmpty())
    <h2>History</h2>
    <table style="padding:20px;">
        <thead>
            <tr>
                <th style="color: white;">Mission Details</th>
                <th style="color: white;">Start Date</th>
                <th style="color: white;">End Date</th>
                <th style="color: white;">Status</th>
                <th style="color: white;">Approve By</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($missionRequests as $missionRequest)
                <tr>
                    <td style="color: white;">{{ $missionRequest->details }}</td>
                    <td style="color: white;">{{ $missionRequest->start_date }}</td>
                    <td style="color: white;">{{ $missionRequest->end_date }}</td>
                    <td style="color: white;">{{ $missionRequest->status }}</td>
                    <td style="color: white;">{{ $missionRequest->approved_by }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No mission requests found.</p>
@endif
