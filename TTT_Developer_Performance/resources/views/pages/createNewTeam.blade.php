@extends('layouts.tester')

@section('title')
    <title>Create New Team</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Team Management</h2>
        <p class="font-bold text-neutral-400 ml-4">Team List / Add Team</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white shadow-md rounded-xl p-6 max-w-[600px] mx-auto">
        <h2 class="text-xl font-bold text-blue-900 mb-4">Create New Team</h2>

        <form action="#" method="POST">
            @csrf

            <!-- Team Name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Team Name <span class="text-red-500">*</span></label>
                <input type="text" name="team_name" placeholder="Team Name" 
                    class="w-full h-12 px-4 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Trello Board Name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Trello Board Name <span class="text-red-500">*</span></label>
                <input type="text" name="trello_board" placeholder="Trello Board Name" 
                    class="w-full h-12 px-4 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Team Members -->
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Team Member</label>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg flex items-center">
                        Name 1 <button class="ml-2 text-gray-500">✕</button>
                    </span>
                    <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg flex items-center">
                        Name 2 <button class="ml-2 text-gray-500">✕</button>
                    </span>
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
        </form>
    </div>
</div>
@endsection
