<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
</head>
<body>

<h2>Send Email</h2>

<form action="{{ url('send-email') }}" method="POST">
    @csrf
    <label for="to">Recipient:</label>
    <input type="email" id="to" name="to" required><br><br>

    <label for="subject">Subject:</label>
    <input type="text" id="subject" name="subject" required><br><br>

    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="5" required></textarea><br><br>

    <button type="submit">Send Email</button>
</form>

</body>
</html>
