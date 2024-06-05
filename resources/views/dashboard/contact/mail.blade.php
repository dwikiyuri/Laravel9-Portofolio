<!DOCTYPE html>
<html>
<head>
    <title>Contact Email</title>
</head>
<body>
    <h2>{{ $details['subject'] }}</h2>
    <p>{{ $details['message'] }}</p>
    <p>From: {{ $details['name'] }} ({{ $details['email'] }})</p>
</body>
</html>
