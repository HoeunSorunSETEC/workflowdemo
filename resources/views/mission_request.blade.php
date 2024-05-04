<form action="{{ route('mission_request.store') }}" method="POST">
    @csrf
    <!-- Add form fields here -->
    <textarea name="details" placeholder="Mission Details"></textarea>
    <input type="date" name="start_date" id="start_date" placeholder="Start Date">
    <input type="date" name="end_date" id="end_date" placeholder="End Date">
    <!-- Add more form fields as needed -->

    <button type="submit">Submit</button>
</form>
