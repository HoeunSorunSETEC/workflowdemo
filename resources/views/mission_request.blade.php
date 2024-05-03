<form action="{{ route('mission_requests.store') }}" method="POST">
    @csrf
    <!-- Add form fields here -->
    <textarea name="details" placeholder="Mission Details"></textarea>
    <!-- Add more form fields as needed -->

    <button type="submit">Submit</button>
</form>
