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
    <div class="bg-white rounded-lg shadow-md p-6 shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <div class="text-2xl font-bold text-blue-900">
                <p>Backlog</p>
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
                <a href="{{ route('addbacklog') }}"
                    class="flex items-center bg-blue-900 text-white px-4 py-1 h-9 rounded text-[12px] font-bold hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-md hover:shadow-lg">
                    <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" alt="Add"
                        class="w-5 h-5 mr-2 transition-transform duration-300 hover:rotate-12">
                    Add New
                </a>
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
                    @foreach ($backlogs as $key => $item)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 text-center text-black">
                            <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                            <!-- ลำดับ # -->
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                {{ $key + 1 }}
                            </th>
                            <!-- Sprint-->
                            <td class="px-6 py-4">
                                {{ $item->sprint_year . '-' . $item->sprint_num }}
                            </td>
                            <!-- Team -->
                            <td class="px-6 py-4">
                                {{ $item->team }}
                            </td>
                            <!-- Member -->
                            <td class="px-6 py-4">
                                {{ $item->member }}
                            </td>
                            <!-- Point all -->
                            <td class="px-6 py-4">
                                {{ $item->personal_point }}
                            </td>
                            <!-- Test pass -->
                            <td class="px-6 py-4">
                                {{ $item->pass_point }}
                            </td>
                            <!-- Bug -->
                            <td class="px-6 py-4">
                                {{ $item->bug }}
                            </td>
                            <!-- Cancel -->
                            <td class="px-6 py-4">
                                {{ $item->cancel }}
                            </td>


                            <!-- Actions button-->
                            <td class="px-6 py-4 flex items-center justify-center space-x-2  h-full ">
                                <a href="{{ route('editminorcase') }}"> <img
                                        src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Edit"
                                        class="w-[35px] h-[35px]" onclick=""> </a>
                                <form action="{{ route('deleteminorcase', $item->id) }}" method="POST"
                                    id="deleteForm{{ $item->id }}" class="flex justify-center items-center"
                                    id="deleteForm{{ $item->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Change the delete button to trigger the alert -->
                                    <button type="button" onclick="showAlert({{ $item->id }})">
                                        <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="Delete"
                                            class="w-[35px] h-[35px]  items-center">
                                    </button>
                                </form>
                            </td>

                        </tr>
                        <div id="alertBox"
                            class="hidden fixed inset-0 flex items-center justify-center bg-gray-100 bg-opacity-50">
                            <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
                                <button onclick="closeAlert()"
                                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-times"></i>
                                </button>
                                <div class="flex justify-center mb-4">
                                    <img alt="Cross icon" class="rounded-full" height="64"
                                        src="{{ asset('resources/Images/Icons/cross.png') }}" width="64" />
                                </div>
                                <h2 class="text-2xl font-bold mb-2">Confirm Deletion</h2>
                                <p class="text-gray-500 mb-6">Are you sure you want to delete this item?</p>
                                <div class="flex justify-center space-x-4">
                                    <!-- Add a data attribute to store the form ID -->
                                    <button id="confirmDelete"
                                        class="bg-red-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-600">
                                        Delete
                                    </button>
                                    <button onclick="closeAlert()"
                                        class="bg-green-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-green-600">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('javascripts')
    <script>
        // Dropdown Year script
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

        // Dropdown Sprint script
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

        // Dropdown Team script
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

        // Dropdown Member script
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


        // Alert Box script
        function showAlert() {
            document.getElementById('alertBox').classList.remove('hidden');
        }

        function closeAlert() {
            document.getElementById('alertBox').classList.add('hidden');
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

        #alertBox {
            z-index: 9999;
            /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
@endsection
