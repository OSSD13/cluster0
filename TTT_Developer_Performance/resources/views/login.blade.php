<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/jpg" sizes="16x16" href="{{ asset('resources/Images/ttt_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ asset('resources/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/global.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="flex justify-center items-center h-screen bg-cover bg-center ">
    <form action="{{ url('/login') }}" method="post" class="w-full h-full max-w-[480px] max-h-[700px] bg-white p-[50px] rounded-[20px] shadow-lg flex flex-col items-center">
        @csrf
        <img src="/resources/Images/ttt_logo.jpg" alt="Logo" class="w-24">
        <h2 class="text-[24px] font-bold text-[var(--primary-color)] mb-5">TTT Developer Performance</h2>
        
        <div class="mb-[30px] w-full">
            <label for="username" class="block font-bold">Username</label>
            <input type="text" name="username" placeholder="Username" required class="w-full h-full max-h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
        </div>
        <div class="mb-[30px] w-full">
            <label for="password" class="block font-bold">Password</label>
            <input type="password" name="password" placeholder="Password" required class="w-full h-full max-h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
        </div>
        
        <div class="flex items-center justify-between w-full mb-[30px]">
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-sm font-bold">Remember me</label>
            </div>
            <a href="#" class="text-sm underline font-bold">Forgot password?</a>
        </div>        
        
        <button type="submit" class="w-full h-[50px] p-2 bg-[var(--primary-color)] text-white rounded-[10px] font-bold hover:bg-[#ffffff] hover:text-[var(--primary-color)] hover:border-3 hover:border-[var(--primary-color)]">Sign In</button>
        
        <div class="flex items-center w-full my-4">
            <div class="flex-1 border-t border-gray-300"></div>
            <span class="px-3 text-gray-400 font-semibold">OR</span>
            <div class="flex-1 border-t border-gray-300"></div>
        </div>        
        
        <a href="{{ route('auth.google') }}" class="w-full h-[50px] p-2 border border-gray-300 text-gray-700 flex items-center justify-center rounded-[10px] hover:bg-gray-100 font-bold">
            <img src="/resources/Images/Icons/google.png" alt="Google Logo" class="w-5 mr-2"> Sign in with Google
        </a>
        
        <div class="mt-[30px] text-sm">
            Don't have an account yet? <a href="{{ url('/register') }}" class="text-[var(--primary-color)] hover:underline"><b>Sign UP</b></a>
        </div>
    </form>
</body>
</html>
