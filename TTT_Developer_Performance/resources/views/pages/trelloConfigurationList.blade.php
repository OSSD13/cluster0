@extends('layouts.tester')

@section('title')
    <title>Trello Configuration List</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Setting</h2>
        <p class="font-bold text-neutral-400">Trello Configuration / List</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-center text-2xl font-bold text-blue-900 mb-6">Create Trello List Setting</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">To-do</h3>
                <div class="bg-gray-700 p-2 rounded mb-2">Your List Name</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">In-progress</h3>
                <div class="bg-gray-700 p-2 rounded mb-2">Doing</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">Done</h3>
                <div class="bg-gray-700 p-2 rounded mb-2">Your List Name</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">Bug / Backlog</h3>
                <div class="bg-gray-700 p-2 rounded mb-2">Your List Name</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">Minor case</h3>
                <div class="bg-gray-700 p-2 rounded mb-2">Your List Name</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">Extra</h3>
                <div class="bg-gray-700 p-2 rounded mb-2">Your List Name</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">Cancel</h3>
                <div class="bg-gray-700 p-2 rounded mb-2">Your List Name</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
        </div>

        <form class="flex flex-col items-center">
            <div class="mb-4 w-[480px]">
                <label for="setting-name" class="block text-sm font-bold text-black mb-2">
                    Setting Name
                </label>
                <input type="text" id="setting-name" placeholder="Setting Name"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4 w-[480px]">
                <label for="choose-list" class="block text-sm font-bold text-black mb-2">Choose List</label>
                <div class="relative">
                    <select id="choose-list" class="w-full p-2 border rounded appearance-none">
                        <option>In-progress</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
            <div class="mb-4 w-[480px]">
                <label for="list-name" class="block text-sm font-bold text-black mb-2">List Name</label>

                <div class="flex items-center">
                    <input type="text" id="list-name" placeholder="List Name"
                        class="px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 flex-grow font-bold" value="">

                    <button class="ml-2 w-[40px] h-[40px] bg-[#00BA00] p-2 rounded-md shadow-md flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('resources/Images/Icons/check (1).png') }}" alt="" class="w-[25px] h-[25px]">
                    </button>
                </div>
            </div>
            <div class="flex justify-center gap-4">
                <button type="button" class="w-58 px-6 py-2 bg-[#636363] text-white rounded-md hover:bg-[#636363]">
                    Cancel
                </button>
                <button type="submit" class="w-58 px-6 py-2 bg-[#00408E] text-white rounded-md hover:bg-[#00408E]">
                    Create
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
