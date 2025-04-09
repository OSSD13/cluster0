@extends('layouts.tester')

@section('title')
    <title>Edit Backlog</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Performance Review</h2>
        <p class="font-bold text-neutral-400">Backlog / Edit</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-left mb-8">
            <h1 class="text-2xl font-bold text-blue-900">Edit Backlog</h1>
        </div>
        <!-- Form Container -->
        <form method="POST" action="{{ route('backlog.update', $backlog->blg_id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- First Row - Dropdowns -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Current Team -->
                <div>
                    <label for="current_team" class="block mb-2 text-sm font-bold text-gray-900">Current Team</label>
                    <select id="current_team" name="current_team"
                        class="team-selector w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        @foreach ($teams as $team)
                            <option value="{{ $team->tm_id }}"
                                {{ (int) $team->tm_id === (int) $backlog->tm_id || $team->tm_name === $team ? 'selected' : '' }}>
                                {{ $team->tm_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Member -->
                <div>
                    <label for="member" class="block mb-2 text-sm font-bold text-gray-900">Member</label>
                    <select id="member" name="member"
                        class="member-selector w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        @foreach ($users as $user)
                            <option value="{{ $user->usr_id }}" {{ $user->usr_id == $backlog->usr_id ? 'selected' : '' }}>
                                {{ $user->usr_username }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Year -->
                <div>
                    <label for="year" class="block mb-2 text-sm font-bold text-gray-900">Year</label>
                    <select id="year" name="year"
                        class="w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        @foreach ($sprints as $sprint)
                            <option value="{{ $sprint->spr_year }}"
                                {{ $sprint->spr_year == $backlog->spr_year ? 'selected' : '' }}>
                                {{ $sprint->spr_year }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sprint -->
                <div>
                    <label for="sprint" class="block mb-2 text-sm font-bold text-gray-900">Sprint</label>
                    <select id="sprint" name="sprint"
                        class="w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        @foreach ($sprints as $sprint)
                            <option value="{{ $sprint->spr_number }}"
                                {{ $sprint->spr_number == $backlog->spr_number ? 'selected' : '' }}>
                                {{ $sprint->spr_number }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Test Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Test Pass -->
                <div>
                    <label for="test_pass" class="block mb-2 text-sm font-bold text-gray-900">Test Pass</label>
                    <input type="text" id="test_pass" name="test_pass" value="{{ $backlog->blg_pass }}"
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Test Pass" required />
                </div>

                <!-- Bug -->
                <div>
                    <label for="bug" class="block mb-2 text-sm font-bold text-gray-900">Bug</label>
                    <input type="text" id="bug" name="bug" value="{{ $backlog->blg_bug }}"
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Bug" required />
                </div>

                <!-- Cancel -->
                <div>
                    <label for="cancel" class="block mb-2 text-sm font-bold text-gray-900">Cancel</label>
                    <input type="text" id="cancel" name="cancel" value="{{ $backlog->blg_cancel }}"
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Cancel" required />
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                <a href="{{ route('backlog') }}"
                    class="min-w-[400px] px-8 py-3 bg-zinc-500 text-white rounded-lg font-bold hover:bg-white hover:text-blue-900 text-center hover:border-2 hover:border-blue-900 transition-all duration-200">
                    Cancel
                </a>
                <button type="submit"
                    class="min-w-[400px] px-8 py-3 bg-blue-900 text-white rounded-lg font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900 transition-all duration-200">
                    Apply
                </button>
            </div>
        </form>
    </div>
@endsection

@section('javascripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const teamSelector = document.querySelector('#current_team');
            const memberSelector = document.querySelector('#member');

            // ฟังก์ชันในการกรองสมาชิกตาม teamId
            function filterMembers(teamId) {
                // ดึงข้อมูลสมาชิกจาก API
                fetch(`/api/members/${teamId}`)
                    .then(response => response.json())
                    .then(data => {
                        // ล้างตัวเลือกเก่าทั้งหมดใน dropdown สมาชิก
                        memberSelector.innerHTML = '<option value="" disabled selected hidden>Member</option>';

                        // เพิ่มตัวเลือกสมาชิกใหม่ใน dropdown
                        data.forEach(member => {
                            const option = document.createElement('option');
                            option.value = member.usr_id;
                            option.textContent = member.usr_username;
                            memberSelector.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching members:', error));
            }

            // เมื่อโหลดหน้าเว็บ ให้กรองสมาชิกตามทีมที่เลือก
            filterMembers(teamSelector.value);

            // เมื่อเลือกทีมใหม่ จะทำการกรองสมาชิกใหม่
            teamSelector.addEventListener('change', function() {
                filterMembers(this.value);
            });
        });
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
