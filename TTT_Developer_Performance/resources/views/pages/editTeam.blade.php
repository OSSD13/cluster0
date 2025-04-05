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
    <h2 class="text-xl font-bold text-blue-900 mb-4">Edit Team</h2>

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
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Team Member</label>
            <div class="flex flex-wrap gap-2">
                @foreach (['Name 1', 'Name 2', 'Name 3', 'Name 4', 'Name 5'] as $member)
                    <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg flex items-center">
                        {{ $member }} <button class="ml-2 text-gray-500">✕</button>
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
        <div class="flex justify-end gap-2">
            <button type="button" class="bg-gray-500 text-white px-6 py-2 rounded-lg">Cancel</button>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded-lg">Apply</button>
        </div>
    </form>
</div>
@endsection
