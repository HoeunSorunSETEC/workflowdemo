<form action="{{ route('leave_request.submit') }}" method="GET">
    @csrf
    <!-- Add form fields here -->
    <input type="text" name="start_date" placeholder="Start Date">
    <input type="text" name="end_date" placeholder="End Date">
    <!-- Add more form fields as needed -->

    <button type="submit">Submit</button>
</form>
