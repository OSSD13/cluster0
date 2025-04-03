<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pending Approval</title>
  <link rel="icon" type="image/jpg" sizes="16x16" href="{{ asset('resources/Images/ttt_logo.jpg') }}"/>
  <link rel="stylesheet" href="{{ asset('resources/css/register.css') }}">
  <link rel="stylesheet" href="{{ asset('resources/css/global.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="flex justify-center items-center h-screen bg-cover bg-center">
    <div class="absolute top-0 left-0 flex items-center ml-4 mt-4">
        <img src="/resources/Images/ttt_logo.jpg" alt="Logo" class="w-24 rounded-[10px]">
        <h2 class="text-[24px] font-bold text-[#ffffff] ml-3 text-[32px]">TTT Developer<br>Performance</h2>
    </div>
    <div class="w-full h-full max-w-[520px] max-h-[320px] bg-white p-[50px] rounded-[20px] shadow-lg flex flex-col items-center">
        <img src="/resources/Images/Icons/warning.png" alt="Logo" class="w-24 mb-[30px]">
        <h2 class="text-[24px] font-bold text-[var(--primary-color)] block text-center w-full">Please wait for permission approval.</h2>
    </div>
</body>
</html>