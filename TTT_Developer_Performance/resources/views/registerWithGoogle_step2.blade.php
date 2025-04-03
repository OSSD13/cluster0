<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Step-2</title>
  <link rel="icon" type="image/jpg" sizes="16x16" href="{{ asset('resources/Images/ttt_logo.jpg') }}"/>
  <link rel="stylesheet" href="{{ asset('resources/css/register.css') }}">
  <link rel="stylesheet" href="{{ asset('resources/css/global.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="flex justify-center items-center h-screen bg-cover bg-center">
  <form action="{{ route('register.google.2') }}" method="POST" class="w-full h-full max-w-[480px] max-h-[560px] bg-white p-[50px] rounded-[20px] shadow-lg flex flex-col items-center">
    <h2 class="text-[24px] font-bold text-[var(--primary-color)] mb-5 block text-left w-full">Create an account</h2>
    @csrf
    <div class="mb-[20px] w-full">
      <label for="email" class="block font-bold">Your Email</label>
      <div class="flex items-center border border-gray-300 rounded-[10px] p-2">
          <img src="{{ $googleUser->avatar ?? null }}" alt="icon" class="w-8 h-8 mr-2 rounded-[20px]">
          <p class="w-full h-full max-h-[50px] font-bold bg-transparent">{{ $googleUser->email ?? 'N/A' }}</p>
      </div>
    </div>
  
    <div class="mb-[30px] w-full">
      <label for="username" class="block font-bold">Your Username</label>
      <input type="text" name="username" placeholder="Your Username" required class="w-full h-full max-h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
    </div>

    <div class="mb-[30px] w-full">
      <label for="name" class="block font-bold">Your Name</label>
      <input type="text" name="name" placeholder="Your Name" required class="w-full h-full max-h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
    </div>

    <div class="flex items-center w-full mb-[30px]">
      <input type="checkbox" name="remember" id="remember" class="mr-2">
      <label for="terms" class="text-sm">I agree to all the <a href="#"><b class="text-[var(--primary-color)]">Terms, Privacy</b> Policy and <b class="text-[var(--primary-color)]">Frees.</b></a></label>
    </div>

    <button type="submit" class="w-full h-[50px] p-2 bg-[var(--primary-color)] text-white rounded-[10px] font-bold hover:bg-[#ffffff] hover:text-[var(--primary-color)] hover:border-3 hover:border-[var(--primary-color)]">Sign Up</button>
  </form>
</body>
</html>
