@extends('layouts.tester')

@section('title')
    <title>ChangePassword</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Change Password</h2>
    </div>
@endsection

@section('contents')
    <div class="bg-white rounded-lg shadow-md p-6 shadow-lg">
        <div class="flex justify-center w-full mt-3">
            <form action="/changepassword" method="POST">
                <div class="flex justify-center items-center gap-6">
                    <div class="flex flex-col items-center">
                        <label for="profile-pic" class="text-lg font-bold mt-2">Profile picture</label>
                        <img id="profile-pic" src="/resources/Images/ttt_logo.jpg" alt="Profile Picture"
                            class="w-[120px] h-[120px] rounded-full shadow-xl">
                    </div>
                </div>
    
                <div class="mt-5 w-full flex flex-col items-center">
                    <div class="mb-[30px]">
                        <label for="name" class="block font-bold">Current Password</label>
                        <input type="text" name="currentPassword" placeholder="Current Password" required=""
                            class="w-[500px] h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
                    </div>
    
    
                    <div class="mb-[30px]">
                        <label for="username" class="block font-bold">New Password</label>
                        <input type="text" name="newPassword" placeholder="New Password" required=""
                            class="w-[500px] h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
                    </div>
    
                    <div class="mb-[30px]">
                        <label for="email" class="block font-bold">Confirm New Password</label>
                        <input type="email" name="confirmNewPassword" placeholder="Confirm New Password" required=""
                            class="w-[500px] h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
                    </div>
                    <div class="flex justify-between w-full mt-5">
                        <button class="bg-gray-300 rounded-lg shadow-xl w-[225px] h-[50px] text-white border border-transparent hover:border-[3px] hover:border-gray-300 hover:bg-white hover:text-gray-300">
                            <strong>Cancel</strong>
                        </button>
                        
                        <button class="bg-[var(--primary-color)] rounded-lg shadow-xl w-[225px] h-[50px] text-white border border-transparent hover:border-[3px] hover:border-[var(--primary-color)] hover:bg-white hover:text-[var(--primary-color)]">
                            <strong>Confirm</strong>
                        </button>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascripts')
    <script></script>
@endsection

@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        #navbar-title {
            font-family: "Jaro", sans-serif;
            line-height: 25px;
            letter-spacing: 0.5px;
        }

        body {
            font-family: "Inter", sans-serif;
        }
    </style>
@endsection
