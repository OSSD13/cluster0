@extends('layouts.tester')

@section('title')
    <title>MyProfile</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">My Profile</h2>
    </div>
@endsection

@section('contents')
    <div class="flex justify-center w-full mb-5">
        <form action="/myprofile" method="POST">
            <div class="flex items-center gap-6 mt-5">
                <div class="flex flex-col items-center">
                    <label for="profile-pic" class="text-lg font-bold mt-2">Profile picture</label>
                    <img id="profile-pic" src="/resources/Images/ttt_logo.jpg" alt="Profile Picture"
                        class="w-[120px] h-[120px] rounded-full shadow-xl">
                </div>
                <button onclick="" class="bg-[var(--primary-color)] rounded-lg shadow-xl w-[160px] h-[40px] text-white">
                    <strong>Change profile</strong>
                </button>

                <button onclick="" class="bg-gray-300 rounded-lg  shadow-xl w-[160px] h-[40px] text-red-500">
                    <strong>Delete profile</strong>
                </button>
            </div>

            <div class="mt-5">
                <div class="mb-[30px] w-full">
                    <label for="name" class="block font-bold">Name</label>
                    <input type="text" name="name" placeholder="Name" required=""
                        class="w-full max-h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
                </div>


                <div class="mb-[30px] w-full">
                    <label for="username" class="block font-bold">Username</label>
                    <input type="text" name="username" placeholder="Username" required=""
                        class="w-full max-h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
                </div>
                <div class="mb-[30px] w-full">
                    <label for="email" class="block font-bold">Email</label>
                    <input type="email" name="email" placeholder="Email" required=""
                        class="w-full max-h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
                </div>
            </div>
            <div class="flex justify-end w-full">
                <button class="bg-gray-300 rounded-lg shadow-xl w-[160px] h-[40px] text-white">
                    <strong>Save changes</strong>
                </button>
            </div>
        </form>
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
