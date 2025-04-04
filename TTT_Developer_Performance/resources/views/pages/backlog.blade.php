@extends('layouts.tester')

@section('title')
    <title>Backlog</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Performance Review</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400"> Backlog</p>
    </div>
@endsection

@section('contents')
    <div class="flex justify-between items-center mb-4">
        <div class="text-2xl font-bold text-blue-900">
            <p>Backlog</p>
        </div>
        <!-- Dropdown Filters -->
        <div class="flex gap-4 ml-4">

            <!-- Year Dropdown -->
            <div class="relative">
                <button id="dropdownYear"
                    class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
                    <span id="dropdownYearSelected" class="truncate text-center w-full">Year:</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="dropdownYearMenu"
                    class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="year2568" value="2568" class="mr-2">
                        <label for="year2568" class="text-black">2568</label>
                    </div>
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="year2567" value="2567" class="mr-2">
                        <label for="year2567" class="text-black">2567</label>
                    </div>
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="year2566" value="2566" class="mr-2">
                        <label for="year2566" class="text-black">2566</label>
                    </div>
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="year2565" value="2565" class="mr-2">
                        <label for="year2565" class="text-black">2565</label>
                    </div>
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="year2564" value="2564" class="mr-2">
                        <label for="year2564" class="text-black">2564</label>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const dropdownYear = document.getElementById('dropdownYear');
                    const dropdownYearMenu = document.getElementById('dropdownYearMenu');
                    const dropdownYearSelected = document.getElementById('dropdownYearSelected');
                    const yearCheckboxes = dropdownYearMenu.querySelectorAll('input[type="checkbox"]');

                    dropdownYear.addEventListener('click', function() {
                        dropdownYearMenu.classList.toggle('hidden');
                    });

                    yearCheckboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            const selectedYears = Array.from(yearCheckboxes)
                                .filter(cb => cb.checked)
                                .map(cb => cb.value)
                                .join(', ');
                            dropdownYearSelected.textContent = `Year: ${selectedYears}`;
                        });
                    });

                    document.addEventListener('click', function(event) {
                        if (!dropdownYear.contains(event.target) && !dropdownYearMenu.contains(event.target)) {
                            dropdownYearMenu.classList.add('hidden');
                        }
                    });
                });
            </script>

            <!-- Sprint Dropdown -->
            <div class="relative">
                <button id="dropdownSprint"
                    class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
                    <span id="dropdownSprintSelected" class="truncate text-center w-full">Sprint:</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="dropdownSprintMenu"
                    class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="sprint1" value="Sprint 1" class="mr-2">
                        <label for="sprint1" class="text-black">Sprint 1</label>
                    </div>
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="sprint2" value="Sprint 2" class="mr-2">
                        <label for="sprint2" class="text-black">Sprint 2</label>
                    </div>
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="sprint3" value="Sprint 3" class="mr-2">
                        <label for="sprint3" class="text-black">Sprint 3</label>
                    </div>
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="sprint4" value="Sprint 4" class="mr-2">
                        <label for="sprint4" class="text-black">Sprint 4</label>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const dropdownSprint = document.getElementById('dropdownSprint');
                    const dropdownSprintMenu = document.getElementById('dropdownSprintMenu');
                    const dropdownSprintSelected = document.getElementById('dropdownSprintSelected');
                    const sprintCheckboxes = dropdownSprintMenu.querySelectorAll('input[type="checkbox"]');

                    dropdownSprint.addEventListener('click', function() {
                        dropdownSprintMenu.classList.toggle('hidden');
                    });

                    sprintCheckboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            const selectedSprints = Array.from(sprintCheckboxes)
                                .filter(cb => cb.checked)
                                .map(cb => cb.value)
                                .join(', ');
                            dropdownSprintSelected.textContent = `Sprint: ${selectedSprints}`;
                        });
                    });

                    document.addEventListener('click', function(event) {
                        if (!dropdownSprint.contains(event.target) && !dropdownSprintMenu.contains(event.target)) {
                            dropdownSprintMenu.classList.add('hidden');
                        }
                    });
                });
            </script>


            <!-- Team Dropdown -->
            <div class="relative">
                <button id="dropdownTeam"
                    class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
                    <span id="dropdownTeamSelected" class="truncate text-center w-full">Team:</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="dropdownTeamMenu"
                    class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="allTeams" value="All Teams" class="mr-2">
                        <label for="allTeams" class="text-black">All Teams</label>
                    </div>
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="team1" value="Team 1" class="mr-2">
                        <label for="team1" class="text-black">Team 1</label>
                    </div>
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="team2" value="Team 2" class="mr-2">
                        <label for="team2" class="text-black">Team 2</label>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const dropdownTeam = document.getElementById('dropdownTeam');
                    const dropdownTeamMenu = document.getElementById('dropdownTeamMenu');
                    const dropdownTeamSelected = document.getElementById('dropdownTeamSelected');
                    const teamCheckboxes = dropdownTeamMenu.querySelectorAll('input[type="checkbox"]');
                    const allTeamsCheckbox = document.getElementById('allTeams');

                    dropdownTeam.addEventListener('click', function() {
                        dropdownTeamMenu.classList.toggle('hidden');
                    });

                    allTeamsCheckbox.addEventListener('change', function() {
                        const isChecked = allTeamsCheckbox.checked;
                        teamCheckboxes.forEach(checkbox => {
                            if (checkbox !== allTeamsCheckbox) {
                                checkbox.checked = isChecked;
                            }
                        });
                        updateSelectedTeams();
                    });

                    teamCheckboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            if (checkbox !== allTeamsCheckbox) {
                                allTeamsCheckbox.checked = Array.from(teamCheckboxes)
                                    .filter(cb => cb !== allTeamsCheckbox)
                                    .every(cb => cb.checked);
                            }
                            updateSelectedTeams();
                        });
                    });

                    function updateSelectedTeams() {
                        const selectedTeams = Array.from(teamCheckboxes)
                            .filter(cb => cb.checked && cb !== allTeamsCheckbox)
                            .map(cb => cb.value)
                            .join(', ');
                        dropdownTeamSelected.textContent = selectedTeams ? `Team: ${selectedTeams}` : 'Team:';
                    }

                    document.addEventListener('click', function(event) {
                        if (!dropdownTeam.contains(event.target) && !dropdownTeamMenu.contains(event.target)) {
                            dropdownTeamMenu.classList.add('hidden');
                        }
                    });
                });
            </script>

            <!-- Member Dropdown -->
            <div class="relative">
                <button id="dropdownMember"
                    class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
                    <span id="dropdownMemberSelected" class="truncate text-center w-full">Member:</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="dropdownMemberMenu"
                    class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="member01" value="Member 01" class="mr-2">
                        <label for="member01" class="text-black">Member 01</label>
                    </div>
                    <div class="flex items-center px-4 py-2">
                        <input type="checkbox" id="member02" value="Member 02" class="mr-2">
                        <label for="member02" class="text-black">Member 02</label>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const dropdownMember = document.getElementById('dropdownMember');
                    const dropdownMemberMenu = document.getElementById('dropdownMemberMenu');
                    const dropdownMemberSelected = document.getElementById('dropdownMemberSelected');
                    const memberCheckboxes = dropdownMemberMenu.querySelectorAll('input[type="checkbox"]');

                    dropdownMember.addEventListener('click', function() {
                        dropdownMemberMenu.classList.toggle('hidden');
                    });

                    memberCheckboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            const selectedMembers = Array.from(memberCheckboxes)
                                .filter(cb => cb.checked)
                                .map(cb => cb.value)
                                .join(', ');
                            dropdownMemberSelected.textContent = `Member: ${selectedMembers}`;
                        });
                    });

                    document.addEventListener('click', function(event) {
                        if (!dropdownMember.contains(event.target) && !dropdownMemberMenu.contains(event.target)) {
                            dropdownMemberMenu.classList.add('hidden');
                        }
                    });
                });
            </script>
            <button class="flex items-center bg-blue-900 text-white px-4 py-2 rounded font-bold">
                <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" alt="Add" class="w-7 h-7 mr-2">
                Add New
            </button>
        </div>
    </div>


    <!-- Table -->
    <div class="relative overflow-x-auto sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
            <!-- Table header -->
            <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b dark:border-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">#</th>
                    <th scope="col" class="px-6 py-3 text-center">Sprint</th>
                    <th scope="col" class="px-6 py-3 text-center">Team</th>
                    <th scope="col" class="px-6 py-3 text-center">Member</th>
                    <th scope="col" class="px-6 py-3 text-center">
                        <div class="flex items-center justify-center">
                            <span>Point All</span>
                            <button class="ml-2">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </button>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        <div class="flex items-center justify-center">
                            <span>Test Pass</span>
                            <button class="ml-2">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </button>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        <div class="flex items-center justify-center">
                            <span>Bug</span>
                            <button class="ml-2">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </button>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        <div class="flex items-center justify-center">
                            <span>Cancel</span>
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
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap text-center">1</th>
                    <td class="px-6 py-4 text-center text-black">67-52</td>
                    <td class="px-6 py-4 text-center text-black">Team2</td>
                    <td class="px-6 py-4 text-center text-black">Louis</td>
                    <td class="px-6 py-4 text-center text-black">2</td>
                    <td class="px-6 py-4 text-center text-black">1</td>
                    <td class="px-6 py-4 text-center text-black">1</td>
                    <td class="px-6 py-4 text-center text-black">0</td>
                    <td class="px-6 py-4 flex items-center justify-center space-x-2">
                        <a href="#"><img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Edit"
                                class="w-[35px] h-[35px]"></a>
                        <a href="#"><img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="Delete"
                                class="w-[35px] h-[35px]"></a>
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap text-center">2</th>
                    <td class="px-6 py-4 text-center text-black">67-52</td>
                    <td class="px-6 py-4 text-center text-black">Team1</td>
                    <td class="px-6 py-4 text-center text-black">Harry</td>
                    <td class="px-6 py-4 text-center text-black">1</td>
                    <td class="px-6 py-4 text-center text-black">1</td>
                    <td class="px-6 py-4 text-center text-black">0</td>
                    <td class="px-6 py-4 text-center text-black">0</td>
                    <td class="px-6 py-4 flex items-center justify-center space-x-2">
                        <a href="#"><img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Edit"
                                class="w-[35px] h-[35px]"></a>
                        <a href="#"><img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="Delete"
                                class="w-[35px] h-[35px]"></a>
                    </td>
                </tr>
            </tbody>
        </table>
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
