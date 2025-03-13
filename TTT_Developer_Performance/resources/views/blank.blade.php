<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>ยินดีต้อนรับ, {{ $user->username }}</h1>
    {{-- <p>Email: {{ $user->email }}</p> --}}
    <p>User ID: {{ $user->id }}</p>
</body>
</html>
