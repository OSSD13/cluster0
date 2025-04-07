@extends('layouts.tester')

@section('title')
    <title>Member Management</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Member Management</h2>
        <p class="font-bold text-neutral-400 ml-4">Member List / Edit</p>
    </div>
@endsection

@section('contents')
    <div class="flex flex-col items-center justify-start min-h-screen ml-10 pt-10">
        <div class="w-[500px] h-[600px] bg-white p-6 rounded-2xl shadow-lg">
            <!-- Header -->
            <h3 class="text-xl font-bold text-blue-900 text-left mb-4 ml-5">Edit Member</h3>

            <!-- Name Input -->
            <div class="w-[400px] ml-5">
                <label class="block font-bold text-gray-700">Name</label>
                <input type="text" value="{{ $usr_name }}" placeholder="Your Name"
                    class="w-full p-3 border border-gray-400 rounded-lg placeholder-gray-400 text-base">
            </div>

            <!-- Trello Name Input -->
            <div class="w-[400px] mt-4 ml-5">
                <label class="block font-bold text-gray-700">Trello Full Name</label>
                <input type="text" value="{{ $usr_trello_fullname }}" placeholder="Your Trello Name"
                    class="w-full p-3 border border-gray-400 rounded-lg placeholder-gray-400 text-base">
            </div>


            <!-- Dropdown -->
            <div class="w-[400px] mt-3 ml-5">
                <select
                    class="w-[400px] h-[50px] border-2 p-2 rounded-lg pr-10 text-blue-900
                focus:outline-none focus:ring-2 focus:ring-[#00408e] focus:border-[#00408e]
                hover:bg-blue-100 mt-4"
                    style="border-color: #00408e;
                background-image: url('data:image/svg+xml;utf8,<svg fill=\'%2300408e\' height=\'24\' viewBox=\'0 0 24 24\' width=\'24\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>');
                background-repeat: no-repeat;
                background-position: right 1rem center;
                background-size: 1.5rem;
                appearance: none;">
                    <option class="text-center text-blue-900 bg-white">Choose Team</option>
                    <option class="text-center text-blue-900 bg-white">Team 1</option>
                    <option class="text-center text-blue-900 bg-white">Team 2</option>
                    <option class="text-center text-blue-900 bg-white">Team 3</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-start mt-6 gap-1 ml-5">
                <button class="w-[199px] h-[50px] bg-gray-600 text-white rounded-lg font-bold hover:bg-gray-800"
                    onclick="window.location.href='{{ route('memberlist') }}'">
                    Cancel
                </button>
                <button class="w-[199px] h-[50px] bg-blue-900 text-white rounded-lg font-bold hover:bg-blue-700">
                    Apply
                </button>
            </div>
        </div>
    </div>
@endsection



@section('styles')
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
@endsection
