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
    <div class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-left mb-8">
            <h1 class="text-2xl font-bold text-blue-900">Create Backlog</h1>
        </div>

        <form method="POST" action="{{ route('backlog.store') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Team Dropdown -->
                <div>
                    <label for="team_id" class="block mb-2 text-sm font-bold text-gray-900">Team</label>
                    <select name="team_id" id="team_id" required
                        class="w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        <option value="" disabled>Select team</option>
                        @foreach ($teams as $team)
                            <option value="{{ $team->tm_id }}">{{ $team->tm_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Member Dropdown -->
                <div>
                    <label for="member_id" class="block mb-2 text-sm font-bold text-gray-900">Member</label>
                    <select name="member_id" id="member_id" required
                        class="w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        <option value="" disabled>Select member</option>
                    </select>
                </div>

                <!-- Year Input -->
                <div>
                    <label for="year" class="block mb-2 text-sm font-bold text-gray-900">Year</label>
                    <input type="text" name="year" id="year" required
                        class="w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900"
                        placeholder="Enter Year">
                </div>

                <!-- Sprint Input -->
                <div>
                    <label for="sprint_id" class="block mb-2 text-sm font-bold text-gray-900">Sprint</label>
                    <input type="text" name="sprint_id" id="sprint_id" required
                        class="w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900"
                        placeholder="Enter Sprint Number">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label for="test_pass" class="block mb-2 text-sm font-bold text-gray-900">Test Pass</label>
                    <input type="number" name="test_pass" id="test_pass" required
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="bug" class="block mb-2 text-sm font-bold text-gray-900">Bug</label>
                    <input type="number" name="bug" id="bug" required
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="cancel" class="block mb-2 text-sm font-bold text-gray-900">Cancel</label>
                    <input type="number" name="cancel" id="cancel" required
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Centering the buttons and adjusting button size -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                <!-- Cancel Button -->
                <button type="button" onclick="window.location.href='{{ route('backlog') }}'"
                    class="min-w-[400px] px-8 py-3 bg-zinc-500 text-white rounded-lg font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900 transition-all duration-200">
                    Cancel
                </button>

                <!-- Add Backlog Button -->
                <button type="submit"
                    class="min-w-[400px] px-8 py-3 bg-blue-900 text-white rounded-lg font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900 transition-all duration-200">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const teamSelector = document.querySelector('#team_id');
            const memberSelector = document.querySelector('#member_id');

            // ฟังก์ชันสำหรับดึงสมาชิกของทีม
            function fetchMembers(teamId) {
                if (teamId) {
                    fetch(`/get-members-by-team/${teamId}`)
                        .then(response => response.json())
                        .then(members => {
                            memberSelector.innerHTML = ''; // ล้าง options เดิม

                            const defaultOption = document.createElement('option');
                            defaultOption.value = '';
                            defaultOption.textContent = 'Select member';
                            defaultOption.disabled = true;
                            defaultOption.selected = true;
                            memberSelector.appendChild(defaultOption);

                            members.forEach(member => {
                                const option = document.createElement('option');
                                option.value = member.usr_id;
                                option.textContent = member.usr_username;
                                memberSelector.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching members:', error);
                            memberSelector.innerHTML =
                                '<option value="" disabled selected>Error loading members</option>';
                        });
                } else {
                    memberSelector.innerHTML =
                        '<option value="" disabled selected>Select a team first</option>';
                }
            }

            // เมื่อเลือกทีม
            teamSelector.addEventListener('change', function() {
                fetchMembers(this.value);
            });
        });
    </script>
@endsection
