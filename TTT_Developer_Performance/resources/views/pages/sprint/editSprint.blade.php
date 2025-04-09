@extends('layouts.tester')

@section('title')
    <title>Sprint Management</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Sprint Management</h2>
        <p class="font-bold text-neutral-400 ml-4">Sprint List / Edit</p>
    </div>
@endsection

@section('contents')
    <form action="{{ route('memberlist.update', $user->usr_id) }}" method="POST">

        @csrf
        <div class="flex flex-col items-center justify-start min-h-screen ml-10 pt-10">
            <div class="w-[500px] h-[600px] bg-white p-6 rounded-2xl shadow-lg">
                <!-- Header -->
                <h3 class="text-xl font-bold text-blue-900 text-left mb-4 ml-5">Edit Sprint</h3>

                <!-- Year Input -->
                <div class="w-[400px] ml-5">
                    <label class="block font-bold text-gray-700">Year</label>

                    <input type="text" name="year" value="{{ $user->usr_name }}" placeholder="Year"
                        class="w-full p-3 border border-gray-400 rounded-lg placeholder-gray-400 text-base">
                </div>

                <!-- Sprint Input -->
                <div class="w-[400px] mt-4 ml-5">
                    <label class="block font-bold text-gray-700">Sprint</label>

                    <input type="text" name="sprint" value="{{ $user->usr_trello_fullname }}" placeholder="Sprint"
                        class="w-full p-3 border border-gray-400 rounded-lg placeholder-gray-400 text-base">
                </div>


                <!-- Dropdown -->
                <div class="w-[400px] mt-3 ml-5">
                    <select name="team_id"
                        class="w-[400px] h-[50px] border-2 p-2 rounded-lg pr-10 text-blue-900
                focus:outline-none focus:ring-2 focus:ring-[#00408e] focus:border-[#00408e]
                hover:bg-blue-100 mt-4"
                        style="border-color: #00408e;
                background-image: url('data:image/svg+xml;utf8,<svg fill=\'%2300408e\' height=\'24\' viewBox=\'0 0 24 24\' width=\'24\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>');
                background-repeat: no-repeat;
                background-position: right 1rem center;
                background-size: 1.5rem;
                appearance: none;">
                        {{-- option disabled คือค่า default "Choose Team" --}}
                        <option disabled {{ is_null($lastTeamId) ? 'selected' : '' }}>
                            Choose Team
                        </option>

                        @foreach ($teams as $team)
                            <option value="{{ $team->tm_id }}" {{ $lastTeamId == $team->tm_id ? 'selected' : '' }}>
                                {{ $team->tm_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex justify-start mt-6 gap-1 ml-5">

                    <button class="w-[199px] h-[50px] bg-gray-600 text-white rounded-lg font-bold hover:bg-gray-800"
                        onclick="window.location.href='{{ route('sprintlist') }}'">
                        Cancel
                    </button>
                    <button class="w-[199px] h-[50px] bg-blue-900 text-white rounded-lg font-bold hover:bg-blue-700"
                        type="submit">
                        Apply
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection



@section('styles')
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
@endsection
