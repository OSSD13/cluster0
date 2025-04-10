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
                        <span id="dropdownYearSelected" class="truncate text-center w-full">Year: All</span>
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
                        <span id="dropdownSprintSelected" class="truncate text-center w-full">Sprint: All</span>
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
                        <span id="dropdownTeamSelected" class="truncate text-center w-full">Team: All</span>
                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="dropdownTeamMenu"
                        class="absolute hidden mt-1 w-40 bg-white border border-gray-300 rounded shadow-lg z-10 text-sm">
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="allTeams" value="All Teams" class="mr-2 h-3 w-3" checked>
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
                        <span id="dropdownMemberSelected" class="truncate text-center w-full">Member: All</span>
                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="dropdownMemberMenu"
                        class="absolute hidden mt-1 w-40 bg-white border border-gray-300 rounded shadow-lg z-10 text-sm">
                        <div class="flex items-center px-3 py-1">
                            <input type="checkbox" id="allMembers" value="All Members" class="mr-2 h-3 w-3" checked>
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

                            <!-- ลำดับ # -->
                            <td class="px-4 py-3 font-medium whitespace-nowrap">
                                {{ $key + 1 }}
                            </td>

                            <!-- Sprint (ปี + หมายเลข) -->
                            <td class="px-4 py-3">
                                {{ $item->spr_year . '-' . $item->spr_number }}
                            </td>

                            <!-- ชื่อทีม -->
                            <td class="px-4 py-3">
                                {{ $item->tm_name ?? 'ไม่มีทีม' }}
                            </td>

                            <!-- ชื่อสมาชิก -->
                            <td class="px-4 py-3">
                                {{ $item->usr_username ?? 'ไม่มีข้อมูล' }}
                            </td>

                            <!-- คะแนนรวม (blg_point_all = blg_test_pass + blg_bug + blg_cancel) -->
                            <td class="px-4 py-3">
                                {{ ($item->blg_pass ?? 0) + ($item->blg_bug ?? 0) + ($item->blg_cancel ?? 0) }}
                            </td>

                            <!-- คะแนนที่ผ่านการทดสอบ -->
                            <td class="px-4 py-3">
                                {{ $item->blg_pass ?? '0' }}
                            </td>

                            <!-- จำนวนบัก -->
                            <td class="px-4 py-3">
                                {{ $item->blg_bug ?? '0' }}
                            </td>

                            <!-- จำนวนบักที่ถูกยกเลิก -->
                            <td class="px-4 py-3">
                                {{ $item->blg_cancel ?? '0' }}
                            </td>
                            <td class="px-4 py-3 flex justify-center items-center space-x-3 h-full">
                                <!-- ปุ่มแก้ไข -->
                                <div>
                                    <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Edit"
                                        class="w-[35px] h-[35px] opacity-50 cursor-not-allowed">
                                </div>

                                <!-- ปุ่มลบ -->
                                <button type="button"
                                    onclick="openAlertDelete({{ $item->blg_id }}, '{{ $item->usr_username }}')"
                                    class="text-red-600 hover:text-red-800 transform translate-y-[-2px] ml-2 btn-hover-animate">
                                    <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="Delete"
                                        class="w-[35px] h-[35px]">
                                </button>
                            </td>

                            <!-- Modal ยืนยันการลบ -->
                            <div id="alertDeleteBox"
                                class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                <div class="bg-white rounded-lg shadow-xl p-8 relative max-w-md w-full mx-4 modal-content">
                                    <button onclick="closeAlertDelete()"
                                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="icon-container w-24 h-24 bg-transparent rounded-full flex items-center justify-center mb-4">
                                            <img src="{{ asset('resources/Images/Icons/cross.png') }}" alt="Delete Icon"
                                                class="icon w-12 h-12 object-contain">
                                        </div>

                                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Confirm Deletion</h2>
                                        <p class="text-gray-600 mb-6 text-center" id="deleteConfirmationText">
                                            Are you sure you want to delete this item?
                                        </p>
                                        <form id="deleteBacklogForm" method="POST" class="w-full">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex justify-center space-x-4">
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                                    Delete
                                                </button>
                                                <button type="button" onclick="closeAlertDelete()"
                                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Alert Success Box -->
    <div id="alertSuccessBox" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
            <!-- ปุ่มปิด -->
            <button onclick="closeSuccessAlert()"
                class="absolute top-2 right-4 text-gray-400 text-2xl hover:text-gray-600">
                &times;
            </button>

            <!-- ไอคอน -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('resources/Images/Icons/check (1).png') }}" alt="Check icon" class="w-16 h-16">
            </div>

            <!-- ข้อความ -->
            <h2 class="text-2xl font-bold text-black mb-2">Successful</h2>
            <p class="text-gray-500 mb-6"> Backlog has update!! </p>

            <!-- ปุ่ม Done -->
            <button onclick="closeSuccessAlert()"
                class="bg-green-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-green-600">
                Done
            </button>
        </div>
    </div>
@endsection

@section('javascripts')
    <script>
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

            // Only add parameters if there are selected filters
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

            // Helper functions to update dropdown text
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
                    .map(cb => cb.value);
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

            // ในส่วนของ Event Listener สำหรับ Member Dropdown
            document.querySelectorAll('#dropdownMemberMenu input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (checkbox.id === 'allMembers') {
                        // เมื่อเลือก All Members ให้ยกเลิกการเลือกสมาชิกอื่นๆ
                        document.querySelectorAll(
                                '#dropdownMemberMenu input[type="checkbox"]:not(#allMembers)')
                            .forEach(cb => cb.checked = false);
                        document.getElementById('dropdownMemberSelected').textContent =
                            'Member: All';
                    } else {
                        // เมื่อเลือกสมาชิกใดๆ ให้ยกเลิกการเลือก All Members
                        document.getElementById('allMembers').checked = false;
                        const selected = Array.from(document.querySelectorAll(
                                '#dropdownMemberMenu input[type="checkbox"]:checked:not(#allMembers)'
                            ))
                            .map(cb => cb.value);
                        document.getElementById('dropdownMemberSelected').textContent =
                            selected.length > 0 ? `Member: ${selected.join(', ')}` : 'Member: All';
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

        function openAlertDelete(blgId) {
            // กำหนด action ให้กับฟอร์มลบ
            const form = document.getElementById('deleteBacklogForm');
            form.action = `/backlog/${blgId}`; // ให้ตรงกับ Route::delete('/backlog/{id}')

            // แสดง modal
            document.getElementById('alertDeleteBox').classList.remove('hidden');
        }

        function closeAlertDelete() {
            document.getElementById('alertDeleteBox').classList.add('hidden');
        }

        @if (session('success'))
            window.addEventListener('DOMContentLoaded', function() {
                openSuccessAlert();
            });

            function openSuccessAlert() {
                document.getElementById("alertSuccessBox").classList.remove("hidden");
            }

            function closeSuccessAlert() {
                document.getElementById("alertSuccessBox").classList.add("hidden");
            }

            // ปิด alert ถ้าคลิกนอกกล่อง
            document.getElementById("alertSuccessBox").addEventListener('click', function(e) {
                if (e.target === this) {
                    closeSuccessAlert();
                }
            });
        @endif
    </script>
@endsection

@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        /* ... existing styles ... */

        /* Dropdown animations */
        .dropdown-menu {
            transform-origin: top;
            transform: scaleY(0);
            opacity: 0;
            transition: transform 0.2s ease-out, opacity 0.1s ease-out;
        }

        .dropdown-menu.show {
            transform: scaleY(1);
            opacity: 1;
        }

        /* Table row hover animation */
        tbody tr {
            transition: all 0.2s ease;
        }

        tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Button hover animation */
        .btn-hover-animate {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .btn-hover-animate:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Modal animations */
        .modal-enter {
            animation: modalFadeIn 0.3s ease-out forwards;
        }

        .modal-leave {
            animation: modalFadeOut 0.2s ease-in forwards;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes modalFadeOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        /* Success alert animation */
        .alert-success-pop {
            animation: alertPop 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        @keyframes alertPop {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .icon-container {
            background-color: rgba(0, 0, 0, 0.3);
            /* พื้นหลังโปร่งใส */
            z-index: 9999;
            /* สูงกว่าทุกอย่างในหน้า */
            position: relative;
        }

        .icon {
            width: 7rem;
            /* ขนาดใหม่ของรูป */
            height: 7rem;
            /* ขนาดใหม่ของรูป */
            object-fit: contain;
        }


        #alertDeleteBox {
            z-index: 9999;
            /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }

        #alertSuccessBox {
            z-index: 9999;
            /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
@endsection
