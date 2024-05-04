<form action="{{ route('leave_request.store') }}" method="POST">
    @csrf
    <!-- Add form fields here -->
    <input type="date" name="start_date" placeholder="Start Date">
    <input type="date" name="end_date" placeholder="End Date">
    <!-- Add more form fields as needed -->

    <button type="submit">Submit</button>
</form>
