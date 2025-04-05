@extends('layouts.tester')

@section('title')
    <title>Create Backlog</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Performance Review</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Backlog / Add</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white rounded-lg shadow-md p-6 shadow-lg">

        <!-- Input All Inline -->
        <div class="text-xl font-bold mb-4 text-blue-900 w-full max-w-[900px] mx-auto">
            <p>Create Backlog</p>
        </div>

        <!-- Input All Inline -->
        <div class="flex flex-wrap gap-4 mb-[30px] w-full max-w-[900px] mx-auto">

            <!-- Input Member -->
            <div class="w-full sm:w-1/4">
                <label for="member" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Member <span
                        class="text-red-500">*</span></label>
                <select id="member"
                    class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                    <option value="" disabled selected hidden class="text-center">Member</option>
                    <option value="Member A">Sun</option>
                    <option value="Member B">ohm</option>
                </select>
            </div>

            <!-- Input Current Team -->
            <div class="w-full sm:w-1/4">
                <label for="current_team" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Current Team
                    <span class="text-red-500">*</span></label>
                <select id="member"
                    class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                    <option value="" disabled selected hidden class="text-center">Team</option>
                    <option value="Team A">Team A</option>
                    <option value="Team B">Team B</option>
                </select>
            </div>

            <!-- Input Year / sprint -->
            <div class="w-full sm:w-1/9">
                <label for="year" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Year <span
                        class="text-red-500">*</span></label>
                <select id="year"
                    class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                    <option value="" disabled selected hidden class="text-center">Year</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </div>

            <div class="w-full sm:w-1/9">
                <label for="sprint" class="invisible block mb-2 text-sm font-bold text-gray-900 dark:text-white"><span
                        class="text-red-500">*</span></label>
                <select id="sprint"
                    class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                    <option value="" disabled selected hidden class="text-center">Sprint</option>
                    <option value="Sprint 1">Sprint 1</option>
                    <option value="Sprint 2">Sprint 2</option>
                </select>
            </div>
        </div>

        <!-- Input Points -->
        <div class="flex flex-wrap gap-4 mb-[30px] w-full max-w-[900px] mx-auto">
            <!-- Input Point All -->
            <div class="w-full sm:w-1/4">
                <label for="point_all" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Point All <span
                        class="text-red-500">*</span></label>
                <input type="text" id="point_all"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Point" required />
            </div>
        </div>

        <!-- Input Test Pass -->
        <div class="flex flex-wrap gap-4 mb-[30px] w-full max-w-[900px] mx-auto">
            <div class="w-full sm:w-1/4">
                <label for="test_pass" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Test Pass <span
                        class="text-red-500">*</span></label>
                <input type="text" id="test_pass"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Test Pass" required />
            </div>

            <!-- Input Bug -->
            <div class="w-full sm:w-1/4">
                <label for="bug" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Bug <span
                        class="text-red-500">*</span></label>
                <input type="text" id="bug"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Bug" required />
            </div>

            <!-- Input Cancel -->
            <div class="w-full sm:w-1/4">
                <label for="cancel" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Cancel <span
                        class="text-red-500">*</span></label>
                <input type="text" id="cancel"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Cancel" required />
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex flex-wrap gap-4 mb-[30px] w-full max-w-[900px] mx-auto">
            <button type="button" onclick="window.location.href='{{ route('backlog') }}'"
                class="w-full sm:w-[350px] h-[60px] p-2 bg-zinc-500 text-white rounded-[10px] font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900">
                Cancel
            </button> <button type="submit"
                class="w-full sm:w-[350px] h-[60px] p-2 bg-blue-900 text-white rounded-[10px] font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900">Create</button>
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
