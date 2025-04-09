@extends('layouts.tester')

@section('title')
    <title>Extrapoint</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Performance Review</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400"> Extrapoint</p>
    </div>
@endsection

@section('contents')
    @yield('editContainer')
    <div class="bg-white rounded-lg shadow-md p-6 shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <div class="text-2xl font-bold text-blue-900">
                <p>Extrapoint</p>
            </div>
            <!-- Compact Dropdown Filters -->
            <div class="flex gap-2 ml-4 items-center">

                <!-- Year Dropdown -->
                <div class="relative">
                    <button id="dropdownYear"
                        class="border border-blue-900 text-blue-900 text-sm font-bold rounded px-4 py-1 w-30 bg-white h-9 text-center flex justify-between items-center">
                        <span id="dropdownYearSelected" class="truncate text-center w-full">Year:</span>
                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="dropdownYearMenu"
                        class="absolute hidden mt-1 w-40 bg-white border border-gray-300 rounded shadow-lg z-10 text-sm">
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="year2568" value="2568" class="mr-2 h-3 w-3">
                            <label for="year2568" class="text-black">2568</label>
                        </div>
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="year2567" value="2567" class="mr-2 h-3 w-3">
                            <label for="year2567" class="text-black">2567</label>
                        </div>
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="year2566" value="2566" class="mr-2 h-3 w-3">
                            <label for="year2566" class="text-black">2566</label>
                        </div>
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="year2565" value="2565" class="mr-2 h-3 w-3">
                            <label for="year2565" class="text-black">2565</label>
                        </div>
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="year2564" value="2564" class="mr-2 h-3 w-3">
                            <label for="year2564" class="text-black">2564</label>
                        </div>
                    </div>
                </div>

                <!-- Sprint Dropdown -->
                <div class="relative">
                    <button id="dropdownSprint"
                        class="border border-blue-900 text-blue-900 text-sm font-bold rounded px-4 py-1 w-40 bg-white h-9 text-center flex justify-between items-center">
                        <span id="dropdownSprintSelected" class="truncate text-center w-full">Sprint:</span>
                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="dropdownSprintMenu"
                        class="absolute hidden mt-1 w-40 bg-white border border-gray-300 rounded shadow-lg z-10 text-sm">
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="sprint1" value="Sprint 1" class="mr-2 h-3 w-3">
                            <label for="sprint1" class="text-black">Sprint 1</label>
                        </div>
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="sprint2" value="Sprint 2" class="mr-2 h-3 w-3">
                            <label for="sprint2" class="text-black">Sprint 2</label>
                        </div>
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="sprint3" value="Sprint 3" class="mr-2 h-3 w-3">
                            <label for="sprint3" class="text-black">Sprint 3</label>
                        </div>
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="sprint4" value="Sprint 4" class="mr-2 h-3 w-3">
                            <label for="sprint4" class="text-black">Sprint 4</label>
                        </div>
                    </div>
                </div>

                <!-- Team Dropdown -->
                <div class="relative">
                    <button id="dropdownTeam"
                        class="border border-blue-900 text-blue-900 text-sm font-bold rounded px-4 py-1 w-40 bg-white h-9 text-center flex justify-between items-center">
                        <span id="dropdownTeamSelected" class="truncate text-center w-full">Team:</span>
                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="dropdownTeamMenu"
                        class="absolute hidden mt-1 w-40 bg-white border border-gray-300 rounded shadow-lg z-10 text-sm">
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="allTeams" value="All Teams" class="mr-2 h-3 w-3">
                            <label for="allTeams" class="text-black">All Teams</label>
                        </div>
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="team1" value="Team 1" class="mr-2 h-3 w-3">
                            <label for="team1" class="text-black">Team 1</label>
                        </div>
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="team2" value="Team 2" class="mr-2 h-3 w-3">
                            <label for="team2" class="text-black">Team 2</label>
                        </div>
                    </div>
                </div>

                <!-- Member Dropdown -->
                <div class="relative">
                    <button id="dropdownMember"
                        class="border border-blue-900 text-blue-900 text-sm font-bold rounded px-4 py-1 w-40 bg-white h-9 text-center flex justify-between items-center">
                        <span id="dropdownMemberSelected" class="truncate text-center w-full">Member:</span>
                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="dropdownMemberMenu"
                        class="absolute hidden mt-1 w-40 bg-white border border-gray-300 rounded shadow-lg z-10 text-sm">
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="member01" value="Member 01" class="mr-2 h-3 w-3">
                            <label for="member01" class="text-black">Member 01</label>
                        </div>
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="member02" value="Member 02" class="mr-2 h-3 w-3">
                            <label for="member02" class="text-black">Member 02</label>
                        </div>
                    </div>
                </div>

                <!-- Add New Button -->
                <a href="{{ route('createExtraPoint') }}"
                    class="flex items-center bg-blue-900 text-white px-4 py-1 h-9 rounded text-[12px] font-bold hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-md hover:shadow-lg">
                    <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" alt="Add"
                        class="w-5 h-5 mr-2 transition-transform duration-300 hover:rotate-12">
                    Add New
                </a>
            </div>
        </div>


        <!-- Table -->
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full table-auto border-collapse ">
                <!-- Table header -->
                <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b text-center">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">#</th>
                        <th scope="col" class="px-6 py-3 text-center">Sprint</th>
                        <th scope="col" class="px-6 py-3 text-center">Team</th>
                        <th scope="col" class="px-6 py-3 text-center">Member</th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <div class="flex items-center justify-center">
                                <span>Point</span>
                                <button class="ml-2">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </button>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                    @foreach ($extraPoints as $key => $extraPoint)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 text-center text-black">
                            <!-- ลำดับ # -->
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                {{ $key + 1 }}
                            </th>
                            <!-- Sprint -->
                            <td class="px-6 py-4">
                                {{ $extraPoint->spr_year . '-' . $extraPoint->spr_number }}
                            </td>
                            <!-- Team -->
                            <td class="px-6 py-4">
                                {{ $extraPoint->tm_name }}
                            </td>
                            <!-- Member -->
                            <td class="px-6 py-4">
                                {{ $extraPoint->usr_username }}
                            </td>
                            <!-- Point -->
                            <td class="px-6 py-4">
                                {{ $extraPoint->ext_value }}
                            </td>

                            <!-- Actions button -->
                            <td class="px-6 py-4 flex items-center justify-center space-x-2 h-full">

                                <form action="{{ route('editExtraPoint') }}" method="POST">
                                    @csrf
                                    <button type="submit" name="editID" value="{{ $extraPoint->ext_id }}">
                                        <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Edit"
                                            class="w-[35px] h-[35px]">
                                    </button>
                                </form>


                                <!-- ปุ่มลบ ที่เรียก Alert Modal -->
                                <button type="button" onclick="openAlertDelete({{ $extraPoint->ext_id }})"
                                    class="flex justify-center items-center">
                                    <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="Delete"
                                        class="w-[35px] h-[35px] items-center">
                                </button>

                                <!-- Modal กล่องยืนยันการลบ -->
                                <div id="alertDeleteBox"
                                    class="hidden fixed inset-0 flex items-center justify-center bg-gray-100 bg-opacity-50 z-50">
                                    <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
                                        <button onclick="closeAlertDelete()"
                                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <div class="flex justify-center mb-4">
                                            <img alt="Cross icon" class="rounded-full" height="64"
                                                src="{{ asset('resources/Images/Icons/cross.png') }}" width="64" />
                                        </div>
                                        <h2 class="text-2xl font-bold mb-2">Confirm Delection</h2>
                                        <p class="text-gray-500 mb-6">Are you sure want to delete this item?</p>

                                        <form id="deleteBacklogForm" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex justify-center space-x-4">
                                                <button type="submit"
                                                    class="bg-red-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-600">
                                                    Delete
                                                </button>
                                                <button type="button" onclick="closeAlertDelete()"
                                                    class="bg-green-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-green-600">
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection

@section('javascripts')
    <script>
        // ฟังก์ชันสำหรับการกรองข้อมูลและอัปเดต URL
        function applyFilters() {
            // Get selected values from all dropdowns
            const selectedYears = Array.from(document.querySelectorAll('#dropdownYearMenu input[type="checkbox"]:checked'))
                .map(cb => cb.value);
            const selectedSprints = Array.from(document.querySelectorAll(
                '#dropdownSprintMenu input[type="checkbox"]:checked')).map(cb => cb.value.replace('Sprint ', ''));
            const selectedTeams = Array.from(document.querySelectorAll(
                '#dropdownTeamMenu input[type="checkbox"]:checked:not(#allTeams)')).map(cb => cb.value);
            const selectedMembers = Array.from(document.querySelectorAll(
                '#dropdownMemberMenu input[type="checkbox"]:checked:not(#allMembers)')).map(cb => cb.value);

            // Create URL with query parameters
            let url = new URL(window.location.href.split('?')[0], window.location.origin);

            // Reset parameters
            url.searchParams.delete('years');
            url.searchParams.delete('sprints');
            url.searchParams.delete('teams');
            url.searchParams.delete('members');

            if (selectedYears.length > 0) {
                url.searchParams.set('years', selectedYears.join(','));
            }
            if (selectedSprints.length > 0) {
                url.searchParams.set('sprints', selectedSprints.join(','));
            }
            if (selectedTeams.length > 0) {
                url.searchParams.set('teams', selectedTeams.join(','));
            }
            if (selectedMembers.length > 0) {
                url.searchParams.set('members', selectedMembers.join(','));
            }

            // Reload the page with new filters
            window.location.href = url.toString();
        }

        // Initialize dropdowns with current filter values from URL
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);

            // Initialize Year dropdown
            const yearCheckboxes = document.querySelectorAll('#dropdownYearMenu input[type="checkbox"]');
            const selectedYears = urlParams.get('years') ? urlParams.get('years').split(',') : [];
            yearCheckboxes.forEach(checkbox => {
                if (selectedYears.includes(checkbox.value)) {
                    checkbox.checked = true;
                }
            });
            updateYearDropdownText();

            // Initialize Sprint dropdown
            const sprintCheckboxes = document.querySelectorAll('#dropdownSprintMenu input[type="checkbox"]');
            const selectedSprints = urlParams.get('sprints') ? urlParams.get('sprints').split(',') : [];
            sprintCheckboxes.forEach(checkbox => {
                const sprintNumber = checkbox.value.replace('Sprint ', '');
                if (selectedSprints.includes(sprintNumber)) {
                    checkbox.checked = true;
                }
            });
            updateSprintDropdownText();

            // Initialize Team dropdown
            const teamCheckboxes = document.querySelectorAll(
                '#dropdownTeamMenu input[type="checkbox"]:not(#allTeams)');
            const allTeamsCheckbox = document.getElementById('allTeams');
            const selectedTeams = urlParams.get('teams') ? urlParams.get('teams').split(',') : [];
            teamCheckboxes.forEach(checkbox => {
                if (selectedTeams.includes(checkbox.value)) {
                    checkbox.checked = true;
                }
            });
            allTeamsCheckbox.checked = selectedTeams.length === 0 || (teamCheckboxes.length === selectedTeams
                .length);
            updateTeamDropdownText();

            // Initialize Member dropdown
            const memberCheckboxes = document.querySelectorAll(
                '#dropdownMemberMenu input[type="checkbox"]:not(#allMembers)');
            const allMembersCheckbox = document.getElementById('allMembers');
            const selectedMembers = urlParams.get('members') ? urlParams.get('members').split(',') : [];
            memberCheckboxes.forEach(checkbox => {
                if (selectedMembers.includes(checkbox.value)) {
                    checkbox.checked = true;
                }
            });
            allMembersCheckbox.checked = selectedMembers.length === 0 || (memberCheckboxes.length ===
                selectedMembers.length);
            updateMemberDropdownText();

            // Add event listeners to all checkboxes
            document.querySelectorAll('#dropdownYearMenu input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateYearDropdownText();
                    applyFilters();
                });
            });

            document.querySelectorAll('#dropdownSprintMenu input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateSprintDropdownText();
                    applyFilters();
                });
            });

            document.querySelectorAll('#dropdownTeamMenu input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (checkbox.id === 'allTeams') {
                        document.querySelectorAll(
                                '#dropdownTeamMenu input[type="checkbox"]:not(#allTeams)')
                            .forEach(cb => cb.checked = checkbox.checked);
                    } else {
                        const allChecked = Array.from(document.querySelectorAll(
                                '#dropdownTeamMenu input[type="checkbox"]:not(#allTeams)'))
                            .every(cb => cb.checked);
                        document.getElementById('allTeams').checked = allChecked;
                    }
                    updateTeamDropdownText();
                    applyFilters();
                });
            });

            document.querySelectorAll('#dropdownMemberMenu input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (checkbox.id === 'allMembers') {
                        document.querySelectorAll(
                                '#dropdownMemberMenu input[type="checkbox"]:not(#allMembers)')
                            .forEach(cb => cb.checked = false);
                        document.getElementById('dropdownMemberSelected').textContent =
                            'Member: All Members';
                    } else {
                        document.getElementById('allMembers').checked = false;
                        const selected = Array.from(document.querySelectorAll(
                                '#dropdownMemberMenu input[type="checkbox"]:checked:not(#allMembers)'
                                ))
                            .map(cb => cb.value);
                        document.getElementById('dropdownMemberSelected').textContent =
                            selected.length > 0 ? `Member: ${selected.join(', ')}` : 'Member:';
                    }
                    applyFilters();
                });
            });

            // Toggle dropdown menus
            document.getElementById('dropdownYear').addEventListener('click', function(e) {
                e.stopPropagation();
                document.getElementById('dropdownYearMenu').classList.toggle('hidden');
            });

            document.getElementById('dropdownSprint').addEventListener('click', function(e) {
                e.stopPropagation();
                document.getElementById('dropdownSprintMenu').classList.toggle('hidden');
            });

            document.getElementById('dropdownTeam').addEventListener('click', function(e) {
                e.stopPropagation();
                document.getElementById('dropdownTeamMenu').classList.toggle('hidden');
            });

            document.getElementById('dropdownMember').addEventListener('click', function(e) {
                e.stopPropagation();
                document.getElementById('dropdownMemberMenu').classList.toggle('hidden');
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function() {
                document.getElementById('dropdownYearMenu').classList.add('hidden');
                document.getElementById('dropdownSprintMenu').classList.add('hidden');
                document.getElementById('dropdownTeamMenu').classList.add('hidden');
                document.getElementById('dropdownMemberMenu').classList.add('hidden');
            });
        });

        // Prevent dropdown from closing when clicking inside
        document.querySelectorAll('#dropdownYearMenu, #dropdownSprintMenu, #dropdownTeamMenu, #dropdownMemberMenu').forEach(
            menu => {
                menu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });


        // Alert Box script
        function showAlert() {
            document.getElementById('alertBox').classList.remove('hidden');
        }

        function closeAlert() {
            document.getElementById('alertBox').classList.add('hidden');
        }

        function openAlertDelete(ext_id) {
            // กำหนด action ให้กับฟอร์มลบ
            const form = document.getElementById('deleteBacklogForm');
            form.action = `/extrapoint-delete/${ext_id}`; // ให้ตรงกับ Route::delete('/backlog/{id}')

            // แสดง modal
            document.getElementById('alertDeleteBox').classList.remove('hidden');
        }

        function closeAlertDelete() {
            document.getElementById('alertDeleteBox').classList.add('hidden');
        }
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

        #alertDeleteBox {
            z-index: 9999;
            /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
@endsection
