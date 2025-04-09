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
    <div class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto">

        <!-- Header -->
        <div class="text-left mb-8">
            <h1 class="text-2xl font-bold text-blue-900">Create Backlog</h1>
        </div>

        <form method="POST" action="{{ route('backlogs.store') }}">
            <!-- Form Container -->
            <div class="space-y-6">

                <!-- First Row - Dropdowns -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    <!-- Current Team -->
                    <select name="team_id" id="team">
                        @foreach ($backlogs as $team)
                            <option value="{{ $team->tm_id }}">{{ $team->tm_name }}</option>
                        @endforeach
                    </select>

                    <!-- Member -->
                    <select name="member_id" id="member">
                        @foreach ($backlogs as $member)
                            <option value="{{ $member->usr_id }}">{{ $member->usr_name }}</option>
                        @endforeach
                    </select>

                    <!-- Year -->
                    <select name="year" id="year">
                        @foreach ($backlogs as $year)
                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                        @endforeach
                    </select>

                    <!-- Sprint -->
                    <select name="sprint_id" id="sprint">
                        @foreach ($backlogs as $sprint)
                            <option value="{{ $sprint->id }}">Sprint {{ $sprint->spr_number }}</option>
                        @endforeach
                    </select>




                    <!-- Test Metrics -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Test Pass -->
                        <div>
                            <label for="test_pass" class="block mb-2 text-sm font-bold text-gray-900">Test Pass <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="test_pass"
                                class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Test Pass" required />
                        </div>

                        <!-- Bug -->
                        <div>
                            <label for="bug" class="block mb-2 text-sm font-bold text-gray-900">Bug <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="bug"
                                class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Bug" required />
                        </div>

                        <!-- Cancel -->
                        <div>
                            <label for="cancel" class="block mb-2 text-sm font-bold text-gray-900">Cancel <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="cancel"
                                class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Cancel" required />
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                        <button type="button" onclick="window.location.href='{{ route('backlog') }}'"
                            class="min-w-[400px] px-8 py-3 bg-zinc-500 text-white rounded-lg font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900 transition-all duration-200">
                            Cancel
                        </button>
                        <button type="submit"
                            class="min-w-[400px] px-8 py-3 bg-blue-900 text-white rounded-lg font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900 transition-all duration-200">
                            Create
                        </button>
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
