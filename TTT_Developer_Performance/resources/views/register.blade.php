<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="icon" type="image/jpg" sizes="16x16" href="resources/Images/ttt_logo.jpg">
  <link rel="stylesheet" href="resources/css/register.css">
  <link rel="stylesheet" href="resources/css/global.css">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="flex justify-center items-center h-screen bg-cover bg-center">
  <form action="{{ route('step1') }}" method="POST" class="w-full h-full max-w-[480px] max-h-[700px] bg-white p-[50px] rounded-[20px] shadow-lg flex flex-col items-center">
    <h2 class="text-[24px] font-bold text-[var(--primary-color)] mb-5 block text-left w-full">Create an account</h2>
    @csrf
    <div class="mb-[30px] w-full">
      <label for="username" class="block font-bold">Your Username</label>
      <input type="text" name="username" placeholder="Your Username" required class="w-full h-full max-h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
    </div>

    <div class="mb-[30px] w-full">
      <label for="email" class="block font-bold">Your Email</label>
      <input type="email" name="email" placeholder="Your Email" required class="w-full h-full max-h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
    </div>

    <div class="mb-[30px] w-full">
      <label for="password" class="block font-bold">Your Password</label>
      <input type="password" name="password" placeholder="At least 8 characters" required class="w-full h-full max-h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
    </div>

    <div class="flex items-center w-full mb-[30px]">
      <input type="checkbox" name="remember" id="remember" class="mr-2">
      <label for="terms" class="text-sm">I agree to all the <a href="#"><b class="text-[var(--primary-color)]">Terms, Privacy</b> Policy and <b class="text-[var(--primary-color)]">Frees.</b></a></label>
    </div>

    <button type="submit" class="w-full h-[50px] p-2 bg-[var(--primary-color)] text-white rounded-[10px] font-bold hover:bg-[#ffffff] hover:text-[var(--primary-color)] hover:border-3 hover:border-[var(--primary-color)]">Continue</button>

    <div class="flex items-center w-full my-4">
      <div class="flex-1 border-t border-gray-300"></div>
      <span class="px-3 text-gray-400 font-semibold">OR</span>
      <div class="flex-1 border-t border-gray-300"></div>
    </div>

    <a href="{{ route('auth.google') }}" class="w-full h-[50px] p-2 border border-gray-300 text-gray-700 flex items-center justify-center rounded-[10px] hover:bg-gray-100 font-bold">
      <img src="resources/Images/Icons/google.png" alt="Google Logo" class="w-5 mr-2"> Sign up with Google
    </a>

    <div class="text-center mt-4">
      Have an account? <a href="{{ url('/') }}" class="text-[var(--primary-color)] hover:underline"><b>Sign In</b></a>
    </div>
  </form>
</body>
</html>
