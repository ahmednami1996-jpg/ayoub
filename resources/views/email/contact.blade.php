<h2>New Message From Website</h2>


    <p>Hello Agency,</p>

    <p>You have received a new message from your website contact form:</p>

    <p><strong>Name:</strong> {{ $details['name'] }}</p>
    <p><strong>Email:</strong> {{ $details['email'] }}</p>
    <p><strong>Subject:</strong> {{ $details['subject'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $details['message'] }}</p>

    <p>Kind regards,<br>Your Website</p>
