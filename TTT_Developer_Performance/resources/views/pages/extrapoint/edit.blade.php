@extends('layouts.tester')

@section('title')
    <title>Edit Extrapoint</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Performance Review</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Extrapoint / Edit</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto">

        <!-- Header -->
        <div class="text-left mb-8">
            <h1 class="text-2xl font-bold text-blue-900">Edit Extrapoint</h1>
        </div>

        <!-- Form Container -->
        <div class="space-y-6">

            <!-- First Row - Dropdowns -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Member -->
                <div>
                    <label for="member" class="block mb-2 text-sm font-bold text-gray-900">Member <span
                            class="text-red-500">*</span></label>
                    <select id="member"
                        class="w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        <option value="" disabled selected hidden class="text-center">Member</option>
                        <option value="Member A">Sun</option>
                    </select>
                </div>

                <!-- Current Team -->
                <div>
                    <label for="current_team" class="block mb-2 text-sm font-bold text-gray-900">Current Team <span
                            class="text-red-500">*</span></label>
                    <select id="current_team"
                        class="w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        <option value="" disabled selected hidden class="text-center">Team</option>
                        <option value="Team A">Team A</option>
                    </select>
                </div>

                <!-- Year -->
                <div>
                    <label for="year" class="block mb-2 text-sm font-bold text-gray-900">Year <span
                            class="text-red-500">*</span></label>
                    <select id="year"
                        class="w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        <option value="" disabled selected hidden class="text-center">Year</option>
                        <option value="2023">2023</option>
                    </select>
                </div>

                <!-- Sprint -->
                <div>
                    <label for="sprint" class="block mb-2 text-sm font-bold text-gray-900">Sprint <span
                            class="text-red-500">*</span></label>
                    <select id="sprint"
                        class="w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        <option value="" disabled selected hidden class="text-center">Sprint</option>
                        <option value="Sprint 1">Sprint 1</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Point -->
                <div>
                    <label for="test_pass" class="block mb-2 text-sm font-bold text-gray-900">Point All <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="test_pass"
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Point" required />
                </div>
            </div>
            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                <button type="button" onclick="window.location.href='{{  route('extraPoint') }}'"
                    class="min-w-[400px] px-8 py-3 bg-zinc-500 text-white rounded-lg font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900 transition-all duration-200">
                    Cancel
                </button>
                <button type="submit"
                    class="min-w-[400px] px-8 py-3 bg-blue-900 text-white rounded-lg font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900 transition-all duration-200">
                    Create
                </button>
            </div>
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
