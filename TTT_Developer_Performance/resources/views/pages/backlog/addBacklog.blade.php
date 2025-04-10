@extends('layouts.tester')

@section('title')
    <title>Create Backlog</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Performance Review</h2>
        <p class="font-bold text-neutral-400">Backlog / Create</p>
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
            <h1 class="text-2xl font-bold text-blue-900">Create Backlog</h1>
        </div>

        <form method="POST" action="{{ route('backlog.store') }}">
            @csrf
            <div class="flex gap-4 mb-[30px] w-full">
                <!-- Team -->
                <div class="w-1/4">
                    <label for="team" class="block mb-2 text-sm font-bold text-gray-900">
                        Team <span class="text-red-500">*</span>
                    </label>
                    <select id="team" name="blg_tm_id"
                        class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5"
                        required>
                        <option value="" disabled selected hidden>Team</option>
                        @foreach ($teams as $team)
                            @if ($team->tm_is_use == 1)
                                <option value="{{ $team->tm_id }}">{{ $team->tm_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>


                <!-- Member -->
                <div class="w-1/4">
                    <label for="member" class="block mb-2 text-sm font-bold text-gray-900">Member <span
                            class="text-red-500">*</span></label>
                    <select id="member" name="blg_usr_id"
                        class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5"
                        required>
                        <option value="" disabled selected hidden>Member</option>
                        <!-- Members will be loaded dynamically via JavaScript -->
                    </select>
                </div>

                <!-- Year -->
                <div class="w-1/4">
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
                <div class="w-1/4">
                    <label for="sprint" class="block mb-2 text-sm font-bold text-gray-900">Sprint <span
                            class="text-red-500">*</span></label>
                    <select id="sprint" name="blg_spr_id"
                        class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5"
                        required>
                        <option value="" disabled selected hidden>Sprint</option>
                        <!-- Sprints will be filtered by selected year -->
                        @foreach ($sprints as $sprint)
                            <option value="{{ $sprint->spr_id }}" data-year="{{ $sprint->spr_year }}">
                                {{ $sprint->spr_number }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label for="test_pass" class="block mb-2 text-sm font-bold text-gray-900">Test Pass</label>
                    <input type="number" name="blg_pass_point" id="test_pass" required
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="bug" class="block mb-2 text-sm font-bold text-gray-900">Bug</label>
                    <input type="number" name="blg_bug" id="bug" required
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="cancel" class="block mb-2 text-sm font-bold text-gray-900">Cancel</label>
                    <input type="number" name="blg_cancel" id="cancel" required
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

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
                    })
                    .catch(error => console.error('Error fetching members:', error));
            });
        });
    </script>
@endsection
