@extends('layouts.tester')

@section('title')
    <title>Team Performance</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Dashboard</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Team Performance</p>
    </div>
@endsection

@section('contents')
    <!-- ฺBox Team performance -->
    <div class="relative">
        <div
            class=" w-full h-20 bg-white border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-6 flex justify-between items-center mb-[20px]">
            <div class="grid grid-cols-2 gap-2 w-full">
                <div class="items-center flex">
                    <!-- ซ้าย -->
                    <p class="text-3xl font-bold text-[var(--primary-color)]">
                        Team Performance
                    </p>
                </div>
                <div>
                    <div class="grid grid-rows-2 gap-2 justify-end">
                        <div>
                            <div class="grid grid-cols-3 gab-2 ">
                                <div class="flex justify-end col-span-2 items-center">
                                    <p class="text-[12px] pr-[5px] ">Date: 13/01/2025-17/01/2025 </p>
                                    <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Add"
                                        class="w-6 h-6 mr-2 rounded">
                                </div>
                                <div class="flex justify-end">
                                    <a href=""
                                        class="flex items-center bg-green-500 text-white px-5 py-1 w-[100px] h-[25px] rounded text-[12px] font-bold justify-center ">
                                        Finish
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button onclick="togglechooseCardPopup()"
                                class="focus:outline-none flex items-center bg-[var(--primary-color)] text-white px-5 py-1 w-[100px] h-[25px] rounded text-[12px] font-bold justify-center">
                                <img src="../resources/Images/Icons/refresh.png" alt="Reload"
                                    class="w-5 h-5 mr-1 hover:rotate-180 transition-transform duration-300">
                                Reload
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter -->
        <div class="w-full h-15 bg-white border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-4 mb-[20px]">
            <div class="flex items-center text-xl font-bold text-[var(--primary-color)] mb-4 justify-between">

                <div>
                    <div class="flex gap-4">
                        <p class="flex"> <img src="{{ asset('resources/Images/Icons/filter (1).png') }}" alt="Filter"
                                class="w-5 h-5 mr-2"> Filter</p>
                        <!-- Version Dropdown -->
                        <div class="relative">
                            <select id="version" name="version"
                                class="border border-blue-900 text-blue-900 font-bold text-[12px] rounded px-3 py-1 bg-white text-center flex justify-between items-center">
                                <span id="dropdownVersionSelected" class="truncate text-center w-full">Version </span>

                                <option value="v1">Version 1</option>
                                <option value="v2">Version 2</option>
                                <option value="v3">Version 3</option>
                            </select>

                        </div>

                        <!-- Year Dropdown -->
                        <div class="relative">
                            <button id="dropdownYear"
                                class="border border-blue-900 text-blue-900 font-bold text-[12px] rounded px-3 py-1 bg-white text-center flex justify-between items-center">
                                <span id="dropdownYearSelected" class="truncate text-center w-full">Year:</span>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div id="dropdownYearMenu"
                                class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                                <div class="flex items-center px-3 py-1">
                                    <input type="checkbox" id="year2568" value="2568" class="mr-2">
                                    <label for="year2568" class="text-[12px] text-black">2568</label>
                                </div>
                                <div class="flex items-center px-3 py-1">
                                    <input type="checkbox" id="year2567" value="2567" class="mr-2">
                                    <label for="year2567" class="text-[12px] text-black">2567</label>
                                </div>
                                <div class="flex items-center px-3 py-1">
                                    <input type="checkbox" id="year2566" value="2566" class="mr-2">
                                    <label for="year2566" class="text-[12px] text-black">2566</label>
                                </div>
                                <div class="flex items-center px-3 py-1">
                                    <input type="checkbox" id="year2565" value="2565" class="mr-2">
                                    <label for="year2565" class="text-[12px] text-black">2565</label>
                                </div>
                                <div class="flex items-center px-3 py-1">
                                    <input type="checkbox" id="year2564" value="2564" class="mr-2">
                                    <label for="year2564" class="text-[12px] text-black">2564</label>
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
                                    if (!dropdownYear.contains(event.target) && !dropdownYearMenu.contains(event
                                            .target)) {
                                        dropdownYearMenu.classList.add('hidden');
                                    }
                                });
                            });
                        </script>

                        <!-- Sprint Dropdown -->
                        <div class="relative">
                            <button id="dropdownSprint"
                                class="border border-blue-900 text-blue-900 font-bold text-[12px] rounded px-3 py-1 bg-white text-center flex justify-between items-center">
                                <span id="dropdownSprintSelected" class="truncate text-center w-full">Sprint:</span>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div id="dropdownSprintMenu"
                                class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" id="sprint1" value="Sprint 1" class="mr-2">
                                    <label for="sprint1" class="text-[12px] text-black">Sprint 1</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" id="sprint2" value="Sprint 2" class="mr-2">
                                    <label for="sprint2" class="text-[12px] text-black">Sprint 2</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" id="sprint3" value="Sprint 3" class="mr-2">
                                    <label for="sprint3" class="text-[12px] text-black">Sprint 3</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" id="sprint4" value="Sprint 4" class="mr-2">
                                    <label for="sprint4" class="text-[12px] text-black">Sprint 4</label>
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
                                    if (!dropdownSprint.contains(event.target) && !dropdownSprintMenu.contains(event
                                            .target)) {
                                        dropdownSprintMenu.classList.add('hidden');
                                    }
                                });
                            });
                        </script>


                        <!-- Team Dropdown -->
                        <div class="relative">
                            <button id="dropdownTeam"
                                class="border border-blue-900 text-blue-900 font-bold text-[12px] rounded px-3 py-1 bg-white text-center flex justify-between items-center">
                                <span id="dropdownTeamSelected" class="truncate text-center w-full">Team:</span>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div id="dropdownTeamMenu"
                                class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" id="allTeams" value="All Teams" class="mr-2">
                                    <label for="allTeams" class="text-[12px] text-black">All Teams</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" id="team1" value="Team 1" class="mr-2">
                                    <label for="team1" class="text-[12px] text-black">Team 1</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" id="team2" value="Team 2" class="mr-2">
                                    <label for="team2" class="text-[12px] text-black">Team 2</label>
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
                                    if (!dropdownTeam.contains(event.target) && !dropdownTeamMenu.contains(event
                                            .target)) {
                                        dropdownTeamMenu.classList.add('hidden');
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>

                <button class="flex items-center bg-zinc-400 text-white px-7 py-1 rounded text-[12px] font-bold">
                    Clear
                </button>
            </div>
        </div>


        <!-- Team -->
        <div
            class="w-full h-15 bg-[var(--primary-color)] border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-4 mb-[10px]">
            <div class="flex justify-between items-center">
                <p class="text-xl font-bold text-white">Team A</p>
                <span class="text-sm  text-white">Last update: 03/01/2025, 15.45</span>
            </div>
        </div>
        <br>

        <!-- Box All point -->
        <div class="grid grid-cols-3 gap-2 ">
            <div
                class="w-full h-60 flex justify-center col-span-2 bg-white border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-4">
                <div class="grid grid-cols-2 gap-2">

                    <div class="bg-[var(--primary-color)] w-70   h-13 rounded-xl flex justify-between items-center">
                        <div class="bg-[var(--primary-color)] flex-1 h-[35px] rounded-lg flex justify-center items-center">
                            <p class="text-white font-bold">Plan Point</p>
                        </div>

                        <div class="bg-white w-35 h-10 rounded-lg flex justify-center items-center m-1">
                            <p class="text-[var(--primary-color)] font-bold">37</p>
                        </div>
                    </div>


                    <div class="bg-[var(--primary-color)] w-70 h-13 rounded-xl flex justify-between items-center">
                        <div class="bg-[var(--primary-color)] flex-1 h-[35px] rounded-lg flex justify-center items-center">
                            <p class="text-white font-bold">Actual Point</p>
                        </div>

                        <div class="bg-white w-35 h-10 rounded-lg flex justify-center items-center m-1">
                            <p class=" text-[var(--primary-color)] font-bold">38</p>
                        </div>
                    </div>

                    <div class="bg-[var(--primary-color)] w-70 h-13 rounded-xl flex justify-between items-center">
                        <div class="bg-[var(--primary-color)] flex-1 h-[35px] rounded-lg flex justify-center items-center">
                            <p class="text-white font-bold">Surpass</p>
                        </div>

                        <div class="bg-white w-35 h-10 rounded-lg flex justify-center items-center m-1">
                            <p class="text-green-400 font-bold">2.70%</p>
                        </div>
                    </div>

                    <div class="bg-[var(--primary-color)] w-70 h-13 rounded-xl flex justify-between items-center">
                        <div class="bg-[var(--primary-color)] flex-1 h-[35px] rounded-lg flex justify-center items-center">
                            <p class="text-white font-bold">Percent</p>
                        </div>

                        <div class="bg-white w-35 h-10 rounded-lg flex justify-center items-center m-1">
                            <p class=" text-[var(--primary-color)] font-bold">100.70%</p>
                        </div>
                    </div>

                    <div class="bg-[var(--primary-color)] w-70 h-13 rounded-xl flex justify-between items-center">
                        <div
                            class="bg-[var(--primary-color)] flex-1 text-center h-[35px] rounded-lg flex justify-center items-center">
                            <p class="text-white font-bold">Point Current Sprint</p>
                        </div>

                        <div class="bg-white w-35 h-10 rounded-lg flex justify-center items-center m-1">
                            <p class=" text-[var(--primary-color)] font-bold">37</p>
                        </div>
                    </div>

                    <div class="bg-[var(--primary-color)] w-70 h-13 rounded-xl flex justify-between items-center">
                        <div
                            class="bg-[var(--primary-color)] flex-1 text-center h-[35px] rounded-lg flex justify-center items-center">
                            <p class="text-white font-bold">Actual Point Current Sprint</p>
                        </div>

                        <div class="bg-white w-35 h-10 rounded-lg flex justify-center items-center m-1">
                            <p class=" text-[var(--primary-color)] font-bold">37</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Box Chart-->
            <div class="w-full h-full bg-white border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-4 z-0">
                <div id="chart"></div>
            </div>
        </div><br>


        <!-- Team Member Table -->
        <div class="w-full bg-white border-gray-300 rounded-lg shadow-xl p-6">
            <div class="text-xl font-bold mb-4 text-blue-900 flex justify-between items-center">
                <p>Team Members</p>
                <button class="flex items-center bg-blue-900 text-white px-2 py-1 rounded text-[12px] font-bold">
                    <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" alt="Add"
                        class="w-5 h-5 mr-2">
                    Add New
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-[10px] text-center text-gray-500 border-collapse">
                    <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b">
                        <tr>
                            <th class="px-3 py-3">#</th>
                            <th class="px-3 py-3">Member</th>
                            <th class="px-3 py-3">
                                <div class="flex items-center justify-center">
                                    Point Personal
                                    <a href="#">
                                        <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th class="px-3 py-3">
                                <div class="flex items-center justify-center">
                                    Test Pass
                                    <a href="#">
                                        <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th class="px-3 py-3">
                                <div class="flex items-center justify-center">
                                    Bug
                                    <a href="#">
                                        <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th class="px-3 py-3">
                                <div class="flex items-center justify-center">
                                    Final Pass Point
                                    <a href="#">
                                        <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th class="px-3 py-3">
                                <div class="flex items-center justify-center">
                                    Cancel
                                    <a href="#">
                                        <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th class="px-3 py-3">
                                <div class="flex items-center justify-center">
                                    Sum Final
                                    <a href="#">
                                        <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th class="px-3 py-3">Day Off</th>
                            <th class="px-3 py-3">Assign</th>
                            <th class="px-3 py-3">Actions</th>
                        </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody>
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 text-black text-center">
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">Max</td>
                            <td class="px-6 py-4">10</td>
                            <td class="px-6 py-4">10</td>
                            <td class="px-6 py-4">0</td>
                            <td class="px-6 py-4">100.00%</td>
                            <td class="px-6 py-4">0</td>
                            <td class="px-6 py-4">10</td>
                            <!-- Dropdown Test and Not-test  -->
                            <td class="px-6 py-4 text-center items-center">
                                <select onchange="changeColor(this)"
                                    class="px-2 py-1 rounded-md text-white text-[10px] bg-red-600 font-semibold transition-colors duration-300">
                                    <option value="not-test">Not Test</option>
                                    <option value="test" class="text-left">Test</option>
                                </select>
                            </td>
                            <td class="px-4 py-2">
                                <button
                                    class="inline-block border border-gray-400 rounded-full px-4 py-1 text-gray-800 font-medium">
                                    Tester1
                                </button>
                            </td>
                            </td>
                            <!-- Action button-->
                            <td class="px-5 py-5 flex items-center justify-center space-x-2">
                                <a href=""> <img src="{{ asset('resources/Images/Icons/editIcon.png') }}"
                                        alt="Edit" class="w-7 h-7 min-w-7 min-h-7 cursor-pointer" onclick="">
                                </a>
                                <a href=""> <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}"
                                        alt="Delete" class="w-7 h-7 min-w-7 min-h-7 cursor-pointer" onclick=""></a>
                            </td>
                            </td>
                        </tr>
                    </tbody>
                    <!-- Calulate -->
                    <tbody>
                        <tr class="bg-white hover:bg-gray-50 text-zinc-400 font-bold text-center">
                            <td class="px-6 py-4">Sum</td>
                            <td class="px-6 py-4">5</td>
                            <td class="px-6 py-4">37</td>
                            <td class="px-6 py-4">34</td>
                            <td class="px-6 py-4">3</td>
                            <td class="px-6 py-4">34</td>
                            <td class="px-6 py-4">0</td>
                            <td class="px-6 py-4">34</td>
                        </tr>
                    </tbody>


                </table>
            </div>
        </div><br>

        <!-- column -->

        <div class="flex gap-4">
            <!-- ฝั่งซ้าย: Backlog + Minor Case  -->
            <div class="flex flex-col gap-4 w-2/3">
                <!-- Backlog -->
                <div class="w-full bg-white border-gray-300 rounded-lg shadow-xl p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-lg font-bold text-blue-900 text-[20px]">Backlog</h2>
                        <button class="bg-blue-900 text-white px-2 py-1 rounded text-[12px] font-bold flex items-center">
                            <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" alt="Add"
                                class="w-5 h-5 mr-2">
                            Add New
                        </button>
                    </div>
                    <!-- Backlog Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-[10px] text-center text-gray-500 border-collapse">
                            <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b">
                                <tr>
                                    <th class="px-3 py-3">#</th>
                                    <th class="px-3 py-3">Sprint</th>
                                    <th class="px-3 py-3">Member</th>
                                    <th class="px-3 py-3">
                                        <div class="flex items-center justify-center">
                                            Point All
                                            <a href="#">
                                                <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </th>
                                    <th class="px-3 py-3">
                                        <div class="flex items-center justify-center">
                                            Test Pass
                                            <a href="#">
                                                <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </th>
                                    <th class="px-3 py-3">
                                        <div class="flex items-center justify-center">
                                            Bug
                                            <a href="#">
                                                <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </th>
                                    <th class="px-3 py-3">
                                        <div class="flex items-center justify-center">
                                            Cancel
                                            <a href="#">
                                                <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </th>
                                    <th class="px-3 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 text-black text-center">
                                    <td class="px-3 py-3">-</td>
                                    <td class="px-3 py-3">-</td>
                                    <td class="px-3 py-3">-</td>
                                    <td class="px-3 py-3">-</td>
                                    <td class="px-3 py-3">-</td>
                                    <td class="px-3 py-3">-</td>
                                    <td class="px-3 py-3">-</td>
                                    <td class="px-3 py-3">
                                        <div class="flex justify-center gap-1">
                                            <a href="#"><img
                                                    src="{{ asset('resources/Images/Icons/editIcon.png') }}"
                                                    alt="Edit" class="w-6 h-6"></a>
                                            <a href="#"><img
                                                    src="{{ asset('resources/Images/Icons/deleteIcon.png') }}"
                                                    alt="Delete" class="w-6 h-6"></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Minor Case -->
                <div class="w-full bg-white border-gray-300 rounded-lg shadow-xl p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-lg font-bold text-blue-900 text-[20px]">Minor Case</h2>
                        <button class="bg-blue-900 text-white px-2 py-1 rounded text-[12px] font-bold flex items-center">
                            <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" alt="Add"
                                class="w-5 h-5 mr-2">
                            Add New
                        </button>
                    </div>
                    <!-- Minor Case Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-[10px] text-center text-gray-500 border-collapse">
                            <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b">
                                <tr>
                                    <th class="px-3 py-3">#</th>
                                    <th class="px-3 py-3">Sprint</th>
                                    <th class="px-3 py-3">Member</th>
                                    <th class="px-3 py-3">Card Detail</th>
                                    <th class="px-3 py-3">Defect Detail</th>
                                    <th class="px-3 py-3">
                                        <div class="flex items-center justify-center">
                                            Point
                                            <a href="#">
                                                <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </th>
                                    <th class="px-3 py-3">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 text-black text-center">
                                    <td class="px-3 py-3">1</td>
                                    <td class="px-3 py-3">Sprint 4</td>
                                    <td class="px-3 py-3">Max</td>
                                    <td class="px-3 py-3">8</td>
                                    <td class="px-3 py-3">Yes</td>
                                    <td class="px-3 py-3">0</td>
                                    <td class="px-3 py-3">
                                        <div class="flex justify-center gap-1">
                                            <a href="#"><img
                                                    src="{{ asset('resources/Images/Icons/editIcon.png') }}"
                                                    alt="Edit" class="w-6 h-6"></a>
                                            <a href="#"><img
                                                    src="{{ asset('resources/Images/Icons/deleteIcon.png') }}"
                                                    alt="Delete" class="w-6 h-6"></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




            <!-- ฝั่งขวา: Extra Point -->
            <div class="w-1/3">
                <div
                    class="w-full bg-white border-gray-300 rounded-lg shadow-xl px-6 pt-4 pb-3 flex flex-col gap-3 items-center">
                    <p class="text-lg font-bold text-blue-900 text-[20px]">Total Extra Point</p>

                    <div class="flex justify-center items-center">
                        <p class="text-[50px] text-center font-bold text-blue-900">10.5</p>
                    </div>

                    <div class="flex justify-between items-center w-full">
                        <p class="text-[15px] font-bold text-zinc-400">Extra Point</p>
                        <button class="flex items-center bg-blue-900 text-white px-2 py-1 rounded text-[12px] font-bold">
                            <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" alt="Add"
                                class="w-5 h-5 mr-2">
                            Add New
                        </button>
                    </div>
                    <!-- Extra Point Table -->
                    <div class="w-full">
                        <table class="w-full text-[10px] text-center text-gray-500 border-collapse table-auto">
                            <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b">
                                <tr>
                                    <th class="px-3 py-3">#</th>
                                    <th class="px-3 py-3">Member</th>
                                    <th class="px-3 py-3">
                                        <div class="flex items-center justify-center">
                                            Point
                                            <a href="#">
                                                <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </th>
                                    <th class="px-3 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 text-black text-center">
                                    <td class="px-3 py-3">1</td>
                                    <td class="px-3 py-3">Max</td>
                                    <td class="px-3 py-3">4</td>

                                    <td class="px-3 py-3">
                                        <div class="flex justify-center gap-1">
                                            <a href="#"><img
                                                    src="{{ asset('resources/Images/Icons/editIcon.png') }}"
                                                    alt="Edit" class="w-6 h-6"></a>
                                            <a href="#"><img
                                                    src="{{ asset('resources/Images/Icons/deleteIcon.png') }}"
                                                    alt="Delete" class="w-6 h-6"></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 text-black text-center">
                                    <td class="px-3 py-3">2</td>
                                    <td class="px-3 py-3">Luna</td>
                                    <td class="px-3 py-3">1</td>

                                    <td class="px-3 py-3">
                                        <div class="flex justify-center gap-1">
                                            <a href="#"><img
                                                    src="{{ asset('resources/Images/Icons/editIcon.png') }}"
                                                    alt="Edit" class="w-6 h-6"></a>
                                            <a href="#"><img
                                                    src="{{ asset('resources/Images/Icons/deleteIcon.png') }}"
                                                    alt="Delete" class="w-6 h-6"></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Pop-up choose card --}}
    <div class="flex justify-center items-center hidden" id="chooseCard">
        <div class="absolute top-[15%] bg-white w-[1200px] h-[810px] rounded-lg shadow-md shadow-lg">

            {{-- cross x --}}
            <div class="flex justify-end mx-5 my-5">
                <button onclick="togglechooseCardPopup()">
                    <img src="../resources/Images/Icons/x-button.png" alt="" class="w-[20px] h-[20px]">
                </button>
            </div>

            {{-- All cards from Trello + timestamp --}}
            <div class="flex justify-between gap-5 mx-10 my-5">
                <p class="font-bold text-3xl text-[var(--primary-color)]">All cards from Trello</p>
                <p class="font-bold text-lg text-black items-center">Last update: 03/01/2025, 15:42
                </p>
            </div>

            {{-- Add to & Filter --}}
            <div class="flex flex-col gap-3">
                {{-- Bigbox Add to --}}
                <div class="flex justify-center">
                    <div class="bg-white w-[1100px] h-[50px] rounded-lg shadow-md shadow-lg flex items-center">
                        {{-- left --}}
                        <div class="flex justify-between w-full">
                            <div class="flex flex-row gap-4 mx-5 basis-1/2">
                                <p class="text-[var(--primary-color)] font-bold text-xl">Add to</p>
                                <button
                                    class="bg-[var(--primary-color)] text-white rounded-md font-semibold text-md w-[100px] h-[30px]">
                                    Year
                                </button>
                                <button
                                    class="bg-[var(--primary-color)] text-white rounded-md font-semibold text-md w-[100px] h-[30px]">
                                    Sprint
                                </button>
                                <button
                                    class="bg-[var(--primary-color)] text-white rounded-md font-semibold text-md w-[100px] h-[30px]">
                                    Team
                                </button>
                            </div>
                            {{-- right --}}
                            <div class="flex basis-1/2 justify-end items-center gap-4 mx-5">
                                <p class="text-black rounded-md font-semibold text-md">2 selected</p>
                                <button>
                                    <img src="../resources/Images/Icons/deleteIcon.png" alt=""
                                        class="w-[30px] h-[30px]">
                                </button>
                                <button
                                    class="bg-[var(--green-color-text)] w-[150px] h-[30px] rounded-md px-5 flex items-center justify-center gap-2">
                                    <img src="../resources/Images/Icons/checked.png" alt=""
                                        class="w-[20px] h-[20px]">
                                    <p class="text-bold text-md text-white font-semibold">Confirm</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bigbox Filter --}}
                <div class="flex justify-center">
                    <div class="bg-white w-[1100px] h-[50px] rounded-lg shadow-md shadow-lg flex items-center">
                        {{-- left --}}
                        <div class="flex justify-between w-full">
                            <div class="flex flex-row gap-4 mx-5 basis-1/2">
                                {{-- image + filter --}}
                                <div class="flex items-center gap-3">
                                    <img src="../resources/Images/Icons/filter (1).png" alt=""
                                        class="w-[30px] h-[30px]">
                                    <p class="text-[var(--primary-color)] font-bold text-xl">Filter</p>
                                </div>


                                {{-- Board dropdown  --}}
                                <div class="relative ml-[8px]">
                                    <button id="dropdownBoard"
                                        class="border border-blue-900 text-blue-900 font-bold rounded px-2 py-1 w-30 bg-white text-center flex justify-between items-center">
                                        <span id="dropdownYearSelected" class="truncate text-center w-full">Board</span>
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    {{-- BoardMenu --}}
                                    <div id="dropdownBoardMenu"
                                        class="absolute hidden mt-2 w-30 bg-white border border-gray-300 rounded shadow-lg z-10">
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="Board1" value="Board1" class="mr-2">
                                            <label for="Board1" class="text-black">Board1</label>
                                        </div>
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="Board2" value="Board2" class="mr-2">
                                            <label for="Board2" class="text-black">Board2</label>
                                        </div>
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="Board3" value="Board3" class="mr-2">
                                            <label for="Board3" class="text-black">Board3</label>
                                        </div>
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="Board4" value="Board4" class="mr-2">
                                            <label for="Board4" class="text-black">Board4</label>
                                        </div>
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="Board5" value="Board5" class="mr-2">
                                            <label for="Board5" class="text-black">Board5</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- List dropdown  --}}
                                <div class="relative">
                                    <button id="dropdownList"
                                        class="border border-blue-900 text-blue-900 font-bold rounded px-2 py-1 w-30 bg-white text-center flex justify-between items-center">
                                        <span id="dropdownListSelected" class="truncate text-center w-full">List</span>
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    {{-- ListMenu --}}
                                    <div id="dropdownListMenu"
                                        class="absolute hidden mt-2 w-30 bg-white border border-gray-300 rounded shadow-lg z-10">
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="List1" value="List1" class="mr-2">
                                            <label for="List1" class="text-black">List1</label>
                                        </div>
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="List2" value="List2" class="mr-2">
                                            <label for="List2" class="text-black">List2</label>
                                        </div>
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="List3" value="List3" class="mr-2">
                                            <label for="List3" class="text-black">List3</label>
                                        </div>
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="List4" value="List4" class="mr-2">
                                            <label for="List4" class="text-black">List4</label>
                                        </div>
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="List5" value="List5" class="mr-2">
                                            <label for="List5" class="text-black">List5</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- Fullname dropdown  --}}
                                <div class="relative">
                                    <button id="dropdownFullname"
                                        class="border border-blue-900 text-blue-900 font-bold rounded px-2 py-1 w-30 bg-white text-center flex justify-between items-center">
                                        <span id="dropdownFullnameSelected" class="truncate text-center w-full">Full
                                            name</span>
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    {{-- Fullname Menu --}}
                                    <div id="dropdownFullnameMenu"
                                        class="absolute hidden mt-2 w-30 bg-white border border-gray-300 rounded shadow-lg z-10">
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="Fullname1" value="Fullname1" class="mr-2">
                                            <label for="Fullname1" class="text-black">Fullname1</label>
                                        </div>
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="Fullname2" value="Fullname2" class="mr-2">
                                            <label for="Fullname2" class="text-black">Fullname2</label>
                                        </div>
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="Fullname3" value="Fullname3" class="mr-2">
                                            <label for="Fullname3" class="text-black">Fullname3</label>
                                        </div>
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="Fullname4" value="Fullname4" class="mr-2">
                                            <label for="Fullname4" class="text-black">Fullname4</label>
                                        </div>
                                        <div class="flex items-center px-2 py-1">
                                            <input type="checkbox" id="Fullname5" value="Fullname5" class="mr-2">
                                            <label for="Fullname5" class="text-black">Fullname5</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- right --}}
                            <div class="flex basis-1/2 justify-end items-center gap-4 mx-5">
                                <button
                                    class="bg-gray-200 w-[100px] h-[30px] text-white rounded-md font-semibold text-md">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Show cards --}}
            <div class="flex justify-center items-center">
                <div class="bg-white w-[1100px] h-[530px] mt-5">
                    <div class="relative overflow-x-auto sm:rounded-lg max-h-[530px] overflow-y-auto">
                        <!-- Table -->
                        <table class="w-full text-[12px] text-left rtl:text-right text-gray-500">
                            <!-- Table header -->
                            <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b text-center">
                                <tr>
                                    <!-- Table header -->
                                    <th scope="col" class="px-6 py-3"><input type="checkbox" id="selectAll"
                                            class="w-[20px] h-[20px]"></th>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Board</th>
                                    <th scope="col" class="px-6 py-3">List</th>
                                    <th scope="col" class="px-6 py-3">title</th>
                                    <th scope="col" class="px-6 py-3">Detail</th>
                                    <th scope="col" class="px-6 py-3">Full name</th>
                                    <th scope="col" class="px-6 py-3">Point</th>
                                </tr>
                            </thead>
                            @foreach ($cards as $index => $card)
                                <tr class="text-center bg-white hover:bg-gray-200">
                                    <td scope="col" class="px-6 py-3"><input type="checkbox"
                                            class="w-[20px] h-[20px]"></td>
                                    <td scope="col" class="px-6 py-3">{{ $index + 1 }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $card->crd_boardname }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $card->crd_listname }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $card->crd_title }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $card->crd_detail }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $card->crd_member_fullname }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $card->crd_point }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('javascripts')
    <script>
        // Board dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownBoard = document.getElementById('dropdownBoard');
            const dropdownBoardMenu = document.getElementById('dropdownBoardMenu');
            const dropdownBoardSelected = document.getElementById('dropdownBoardSelected');
            const boardCheckboxes = dropdownBoardMenu.querySelectorAll('input[type="checkbox"]');

            dropdownBoard.addEventListener('click', function() {
                dropdownBoardMenu.classList.toggle('hidden');
            });

            boardCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const selectedBoard = Array.from(boardCheckboxes)
                        .filter(cb => cb.checked)
                        .map(cb => cb.value)
                        .join(', ');
                    dropdownBoardSelected.textContent = `Board: ${selectedBoard}`;
                });
            });

            document.addEventListener('click', function(event) {
                if (!dropdownBoard.contains(event.target) && !dropdownBoardMenu.contains(event.target)) {
                    dropdownBoardMenu.classList.add('hidden');
                }
            });
        });

        // List dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownList = document.getElementById('dropdownList');
            const dropdownListMenu = document.getElementById('dropdownListMenu');
            const dropdownListSelected = document.getElementById('dropdownListSelected');
            const listCheckboxes = dropdownListMenu.querySelectorAll('input[type="checkbox"]');

            dropdownList.addEventListener('click', function() {
                dropdownListMenu.classList.toggle('hidden');
            });

            listCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const selectedBoard = Array.from(listCheckboxes)
                        .filter(cb => cb.checked)
                        .map(cb => cb.value)
                        .join(', ');
                    dropdownListSelected.textContent = `Board: ${selectedList}`;
                });
            });

            document.addEventListener('click', function(event) {
                if (!dropdownList.contains(event.target) && !dropdownListMenu.contains(event.target)) {
                    dropdownListMenu.classList.add('hidden');
                }
            });
        });

        // Fullname dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownFullname = document.getElementById('dropdownFullname');
            const dropdownFullnameMenu = document.getElementById('dropdownFullnameMenu');
            const dropdownFullnameSelected = document.getElementById('dropdownFullnameSelected');
            const fullnameCheckboxes = dropdownFullnameMenu.querySelectorAll('input[type="checkbox"]');


            dropdownFullname.addEventListener('click', function() {
                dropdownFullnameMenu.classList.toggle('hidden');
            });

            fullnameCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {

                    const selectedFullname = Array.from(fullnameCheckboxes)
                        .filter(cb => cb.checked)
                        .map(cb => cb.value)
                        .join(', ');


                    dropdownFullnameSelected.textContent = `Board: ${selectedFullname}`;
                });
            });

            document.addEventListener('click', function(event) {
                if (!dropdownFullname.contains(event.target) && !dropdownFullnameMenu.contains(event
                        .target)) {
                    dropdownFullnameMenu.classList.add('hidden');
                }
            });
        });



        var options = {
            series: [{
                name: 'Plan', // Updated name
                data: [44]
            }, {
                name: 'Actual', // Updated name
                data: [53]
            }],
            chart: {
                type: 'bar',
                height: 193
            },
            labels: ['Plan', 'Actual'],
            colors: ['#FFA533', '#60A563'],
            plotOptions: {
                bar: {
                    horizontal: true,
                    dataLabels: {
                        position: 'top',
                    },
                }
            },
            dataLabels: {
                enabled: true,
                offsetX: -6,
                style: {
                    fontSize: '12px',
                    colors: ['#fff']
                }
            },
            stroke: {
                show: true,
                width: 1,
                colors: ['#fff']
            },
            tooltip: {
                shared: true,
                intersect: false
            },
            xaxis: {
                categories: ['Point'],
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        function changeColor(dropdown) {
            // Remove old color classes
            dropdown.classList.remove('bg-red-600', 'bg-lime-600');

            // Add new color class based on the selected value
            if (dropdown.value === 'test') {
                dropdown.classList.add('bg-lime-600');
            } else {
                dropdown.classList.add('bg-red-600');
            }
        }

        // checkbox select
        const selectAllCheckbox = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:not(#selectAll)');

        selectAllCheckbox.addEventListener('change', function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        function togglechooseCardPopup() {
            var dropdown = document.getElementById('chooseCard');
            dropdown.classList.toggle('hidden');
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

        select option {
            background-color: white;
            color: black;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .animate-spin {
            animation: spin 0.5s linear infinite;
        }
    </style>
@endsection
