@extends('layouts.tester')

@section('title')
    <title>Edit Team</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Team Management</h2>
        <p class="font-bold text-neutral-400 ml-4">Team List / Edit</p>
    </div>
@endsection

@section('contents')
<div class="bg-white shadow-md rounded-xl p-6 max-w-[600px] mx-auto">
    <h2 class="text-2xl font-bold text-blue-900 mb-4">Edit Team</h2>

    <form action="#" method="POST">
        @csrf
        @method('PUT')

        <!-- Team Name -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Team Name</label>
            <input type="text" name="team_name" value="Team1" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        <!-- Trello Team Name -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Trello Team Name</label>
            <input type="text" name="trello_board" value="Board Team 1" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
        </div>

  <!-- Team Members -->
<div class="mb-6">
    <label class="block text-black font-bold text-2xl mb-2">Team Member</label>
    <div class="flex flex-wrap gap-4 p-4 rounded-2xl border border-gray-400 bg-gray-50">
        @foreach (['Name 1', 'Name 2', 'Name 3', 'Name 4', 'Name 5'] as $member)
            <span class="inline-flex items-center px-4 py-2 rounded-full border border-blue-700 text-black font-bold">
                {{ $member }}
                <button class="ml-3 text-black hover:text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="9" stroke="black" fill="white"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 8l8 8m0-8l-8 8" />
                    </svg>
                </button>
            </span>
        @endforeach
    </div>
</div>



        <!-- Choose API & Setting -->
        <div class="mb-4 flex gap-4">
            <div class="w-1/2">
                <label class="block text-gray-700 font-bold mb-2">Choose API</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    <option>API set 1</option>
                </select>
            </div>
            <div class="w-1/2">
                <label class="block text-gray-700 font-bold mb-2">Choose Setting</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    <option>Setting 1</option>
                </select>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex justify-center gap-4 mt-4">
            <button type="button" class="w-1/2 h-[50px] bg-gray-500 text-white text-lg rounded-lg hover:bg-gray-600">Cancel</button> 
                <button type="submit"class="w-1/2 h-[50px] bg-blue-900 text-white text-lg rounded-lg hover:bg-blue-800">Create</button>
</div>
    </form>
</div>
@endsection
