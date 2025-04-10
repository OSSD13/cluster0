@extends('layouts.tester')

@section('title')
    <title>Create Extrapoint</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Performance Review</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Extrapoint / Add</p>
    </div>
@endsection

@section('contents')
    @if ($errors->any())
        <div class="w-full max-w-[900px] mx-auto mb-4">
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto">

        <!-- Header -->
        <div class="text-left mb-8">
            <h1 class="text-2xl font-bold text-blue-900">Create Extrapoint</h1>
        </div>

        <!-- Form Container -->
        <div class="space-y-6">

            <form action=" {{ route('storeExtraPoint') }}" method="POST">
                @csrf

                <!-- First Row - Dropdowns -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Team -->
                    <div>
                        <label for="team" class="block mb-2 text-sm font-bold text-gray-900">Team <span
                                class="text-red-500">*</span></label>
                        <select id="team" name="tm_id"
                            class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5"
                            required>
                            <option value="" disabled selected hidden>Team</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->tm_id }}">{{ $team->tm_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Member -->
                    <div>
                        <label for="member" class="block mb-2 text-sm font-bold text-gray-900">Member <span
                                class="text-red-500">*</span></label>
                        <select id="member" name="usr_id"
                            class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5"
                            required>
                            <option value="" disabled selected hidden>Member</option>
                        </select>
                    </div>

                    <!-- Year -->
                    <div>
                        <label for="year" class="block mb-2 text-sm font-bold text-gray-900">Year <span
                                class="text-red-500">*</span></label>
                        <select id="year" name="spr_year"
                            class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5"
                            required>
                            <option value="" disabled selected hidden>Year</option>
                            @foreach ($sprints->unique('spr_year') as $sprint)
                                <option value="{{ $sprint->spr_year }}">{{ $sprint->spr_year }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sprint -->
                    <div>
                        <label for="sprint" class="block mb-2 text-sm font-bold text-gray-900">Sprint <span
                                class="text-red-500">*</span></label>
                        <select id="sprint" name="spr_number"
                            class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5"
                            required>
                            <option value="" disabled selected hidden>Sprint</option>
                            @foreach ($sprints as $sprint)
                                <option value="{{ $sprint->spr_number }}">{{ $sprint->spr_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <!-- Point -->
            <div>
                <label for="your_point" class="block mb-2 text-sm font-bold text-gray-900">Point <span
                        class="text-red-500">*</span></label>
                <input type="number" id="your_point" name="ext_value"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Point" required />
            </div>
        </div>
        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
            <button type="button" onclick="window.location.href='{{ route('extraPoint') }}'"
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const teamSelect = document.getElementById('team');
            const memberSelect = document.getElementById('member');

            teamSelect.addEventListener('change', function() {
                const teamId = this.value;
                fetch(`/api/members/${teamId}`)
                    .then(response => response.json())
                    .then(data => {
                        memberSelect.innerHTML =
                            '<option value="" disabled selected hidden>Member</option>';
                        data.forEach(member => {
                            memberSelect.innerHTML +=
                                `<option value="${member.usr_id}">${member.usr_username}</option>`;
                        });
                    });
            });
        });
        fetch(`/api/members/${teamId}`)
            .then(response => response.json())
            .then(data => {
                memberSelect.innerHTML = '<option value="" disabled selected hidden>Member</option>';
                data.forEach(member => {
                    memberSelect.innerHTML +=
                        `<option value="${member.usr_id}">${member.usr_username}</option>`;
                });
            })
            .catch(error => console.error('Error fetching members:', error));
    </script>
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
