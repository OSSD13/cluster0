<!DOCTYPE html>
<html lang="th">
<head>
    <title>หน้าหลัก</title>
</head>
<body>
    <h2>ยินดีต้อนรับ {{ $user->usr_username }}</h2>
    <p>Email: {{ $user->usr_email }}</p>
    <a href="{{ route('logout') }}">ออกจากระบบ</a>
</body>
</html>