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

                        @foreach ($years as $year)
                            <div class="flex items-center px-3 py-1">
                                <input type="checkbox" id="year{{ $year }}" value="{{ $year }}"
                                    class="mr-2 h-3 w-3">
                                <label for="year{{ $year }}" class="text-black">{{ $year }}</label>
                            </div>
                        @endforeach
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
                        @foreach ($sprints as $sprint)
                            <div class="flex items-center px-3 py-1">
                                <input type="checkbox" id="sprint{{ $sprint }}" value="Sprint {{ $sprint }}"
                                    class="mr-2 h-3 w-3">
                                <label for="sprint{{ $sprint }}" class="text-black">Sprint {{ $sprint }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Team Dropdown -->
                <div class="relative">
                    <button id="dropdownTeam"
                        class="border border-blue-900 text-blue-900 text-sm font-bold rounded px-4 py-1 w-40 bg-white h-9 text-center flex justify-between items-center">
                        <span id="dropdownTeamSelected" class="truncate text-center w-full">Team:</span>
                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="dropdownTeamMenu"
                        class="absolute hidden mt-1 w-40 bg-white border border-gray-300 rounded shadow-lg z-10 text-sm">
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="allTeams" value="All Teams" class="mr-2 h-3 w-3">
                            <label for="allTeams" class="text-black">All Teams</label>
                        </div>
                        @foreach ($teams as $team)
                            <div class="flex items-center px-3 py-1">
                                <input type="checkbox" id="team{{ $team }}" value="{{ $team }}"
                                    class="mr-2 h-3 w-3">
                                <label for="team{{ $team }}" class="text-black">{{ $team }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Member Dropdown -->
                <div class="relative">
                    <button id="dropdownMember"
                        class="border border-blue-900 text-blue-900 text-sm font-bold rounded px-4 py-1 w-40 bg-white h-9 text-center flex justify-between items-center">
                        <span id="dropdownMemberSelected" class="truncate text-center w-full">Member:</span>
                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="dropdownMemberMenu"
                        class="absolute hidden mt-1 w-40 bg-white border border-gray-300 rounded shadow-lg z-10 text-sm">
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="allMembers" value="All Members" class="mr-2 h-3 w-3">
                            <label for="allMembers" class="text-black">All Members</label>
                        </div>
                        @foreach ($members as $member)
                            <div class="flex items-center px-3 py-1">
                                <input type="checkbox" id="member{{ $member }}" value="{{ $member }}"
                                    class="mr-2 h-3 w-3">
                                <label for="member{{ $member }}" class="text-black">{{ $member }}</label>
                            </div>
                        @endforeach
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
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize dropdowns with URL parameters
            function initializeFilters() {
                const urlParams = new URLSearchParams(window.location.search);

                // Year filter
                if (urlParams.has('years')) {
                    const years = urlParams.get('years').split(',');
                    years.forEach(year => {
                        const checkbox = document.querySelector(`#dropdownYearMenu input[value="${year}"]`);
                        if (checkbox) checkbox.checked = true;
                    });
                    updateYearDropdownText();
                }

                // Sprint filter
                if (urlParams.has('sprints')) {
                    const sprints = urlParams.get('sprints').split(',');
                    sprints.forEach(sprint => {
                        const checkbox = document.querySelector(
                            `#dropdownSprintMenu input[value="Sprint ${sprint}"]`);
                        if (checkbox) checkbox.checked = true;
                    });
                    updateSprintDropdownText();
                }

                // Team filter
                if (urlParams.has('teams')) {
                    const teams = urlParams.get('teams').split(',');
                    teams.forEach(team => {
                        const checkbox = document.querySelector(`#dropdownTeamMenu input[value="${team}"]`);
                        if (checkbox) checkbox.checked = true;
                    });
                    updateTeamDropdownText();
                }

                // Member filter
                if (urlParams.has('members')) {
                    const members = urlParams.get('members').split(',');
                    members.forEach(member => {
                        const checkbox = document.querySelector(
                            `#dropdownMemberMenu input[value="${member}"]`);
                        if (checkbox) checkbox.checked = true;
                    });
                    updateMemberDropdownText();
                }
            }

            // Update dropdown button text
            function updateYearDropdownText() {
                const selected = Array.from(document.querySelectorAll(
                        '#dropdownYearMenu input[type="checkbox"]:checked'))
                    .map(cb => cb.value);
                document.getElementById('dropdownYearSelected').textContent =
                    selected.length > 0 ? `Year: ${selected.join(', ')}` : 'Year:';
            }

            function updateSprintDropdownText() {
                const selected = Array.from(document.querySelectorAll(
                        '#dropdownSprintMenu input[type="checkbox"]:checked'))
                    .map(cb => cb.value.replace('Sprint ', ''));
                document.getElementById('dropdownSprintSelected').textContent =
                    selected.length > 0 ? `Sprint: ${selected.join(', ')}` : 'Sprint:';
            }

            function updateTeamDropdownText() {
                const selected = Array.from(document.querySelectorAll(
                        '#dropdownTeamMenu input[type="checkbox"]:checked:not(#allTeams)'))
                    .map(cb => cb.value);
                document.getElementById('dropdownTeamSelected').textContent =
                    selected.length > 0 ? `Team: ${selected.join(', ')}` : 'Team:';
            }

            function updateMemberDropdownText() {
                const selected = Array.from(document.querySelectorAll(
                        '#dropdownMemberMenu input[type="checkbox"]:checked:not(#allMembers)'))
                    .map(cb => cb.value);
                document.getElementById('dropdownMemberSelected').textContent =
                    selected.length > 0 ? `Member: ${selected.join(', ')}` : 'Member:';
            }

            function applyFilters() {
                const getCheckedValues = (selector) =>
                    Array.from(document.querySelectorAll(selector))
                    .filter(cb => cb.checked)
                    .map(cb => cb.value);

                const selectedYears = getCheckedValues('#dropdownYearMenu input[type="checkbox"]');
                const selectedSprints = getCheckedValues('#dropdownSprintMenu input[type="checkbox"]')
                    .map(v => v.replace('Sprint ', ''));

                const selectedTeams = getCheckedValues('#dropdownTeamMenu input[type="checkbox"]:not(#allTeams)');
                const selectedMembers = getCheckedValues(
                    '#dropdownMemberMenu input[type="checkbox"]:not(#allMembers)');

                // Construct base URL without query params
                const url = new URL(window.location.origin + window.location.pathname);

                if (selectedYears.length > 0) {
                    url.searchParams.set('years', selectedYears.join(','));
                } else {
                    url.searchParams.delete('years');
                }

                if (selectedSprints.length > 0) {
                    url.searchParams.set('sprints', selectedSprints.join(','));
                } else {
                    url.searchParams.delete('sprints');
                }

                if (selectedTeams.length > 0) {
                    url.searchParams.set('teams', selectedTeams.join(','));
                } else {
                    url.searchParams.delete('teams');
                }

                if (selectedMembers.length > 0) {
                    url.searchParams.set('members', selectedMembers.join(','));
                } else {
                    url.searchParams.delete('members');
                }

                // Navigate to the new URL with filters applied
                window.location.href = url.toString();
            }

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
                        updateMemberDropdownText();
                    }
                    applyFilters();
                });
            });

            // Toggle dropdown menus with proper positioning
            function toggleDropdown(buttonId, menuId) {
                const button = document.getElementById(buttonId);
                const menu = document.getElementById(menuId);

                // Close all other dropdowns first
                document.querySelectorAll('.dropdown-menu').forEach(dropdown => {
                    if (dropdown.id !== menuId) {
                        dropdown.classList.add('hidden');
                    }
                });

                // Position the dropdown (up or down)
                const buttonRect = button.getBoundingClientRect();
                const spaceBelow = window.innerHeight - buttonRect.bottom;
                const menuHeight = 200; // Approximate menu height

                if (spaceBelow < menuHeight && buttonRect.top > menuHeight) {
                    // Open above the button
                    menu.style.bottom = `${window.innerHeight - buttonRect.top + 5}px`;
                    menu.style.top = 'auto';
                } else {
                    // Open below the button
                    menu.style.top = `${buttonRect.bottom + 5}px`;
                    menu.style.bottom = 'auto';
                }

                menu.classList.toggle('hidden');
            }

            // Set up dropdown toggle events
            document.getElementById('dropdownYear').addEventListener('click', function(e) {
                e.stopPropagation();
                toggleDropdown('dropdownYear', 'dropdownYearMenu');
            });

            document.getElementById('dropdownSprint').addEventListener('click', function(e) {
                e.stopPropagation();
                toggleDropdown('dropdownSprint', 'dropdownSprintMenu');
            });

            document.getElementById('dropdownTeam').addEventListener('click', function(e) {
                e.stopPropagation();
                toggleDropdown('dropdownTeam', 'dropdownTeamMenu');
            });

            document.getElementById('dropdownMember').addEventListener('click', function(e) {
                e.stopPropagation();
                toggleDropdown('dropdownMember', 'dropdownMemberMenu');
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function() {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
            });

            // Prevent dropdown from closing when clicking inside
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });

            // Initialize filters on page load
            initializeFilters();

            // Alert Box script
            function showAlert() {
                document.getElementById('alertBox').classList.remove('hidden');
            }

            function closeAlert() {
                document.getElementById('alertBox').classList.add('hidden');
            }

            function openAlertDelete(ext_id) {
                // Set the form action
                const form = document.getElementById('deleteBacklogForm');
                form.action = `/extrapoint-delete/${ext_id}`;

                // Show modal
                document.getElementById('alertDeleteBox').classList.remove('hidden');
            }

            function closeAlertDelete() {
                document.getElementById('alertDeleteBox').classList.add('hidden');
            }
        });
    </script>
@endsection

@section('styles')
    <style>
        .dropdown-menu {
            position: absolute;
            right: 0;
            min-width: 160px;
            z-index: 1000;
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        /* Make sure dropdowns appear above other content */
        .relative {
            position: relative;
        }

        /* Add some spacing between dropdown items */
        .dropdown-menu div {
            padding: 8px 16px;
        }

        /* Style for dropdown checkboxes */
        .dropdown-menu input[type="checkbox"] {
            margin-right: 8px;
        }
    </style>
@endsection
