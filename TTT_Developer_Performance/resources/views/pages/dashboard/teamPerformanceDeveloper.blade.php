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
                    <div class="grid grid-cols-1 gab-2 ">
                        <div class="flex justify-end col-span-2 items-center">


                        </div>
                        <div class="flex justify-end">
                            <p class="text-[12px] pr-[5px] ">Date: 13/01/2025-17/01/2025 </p>
                        </div>
                    </div>

                </div>
                <div class="flex justify-end">
                    <p class="text-[12px] pr-[5px]">Last update: 03/01/2025, 15.43 น.</p>
                </div>
            </div>

        </div>

    </div>
</div>




<!-- Filter -->
<div class="w-full h-15 bg-white border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-4 mb-[20px]">
    <div class="flex items-center text-xl font-bold text-[var(--primary-color)] mb-4 justify-between">

        <div>
            <div class="flex ">
                <p class="flex ่justify-start"> <img src="{{ asset('resources/Images/Icons/filter (1).png') }}"
                        alt="Filter" class="w-5 h-5 mr-2"> Filter</p>
            </div>
        </div>

        <!-- Year Dropdown -->
        <div class="flex items-center gap-2 ml-auto">
            <div class="relative flex justify-end">
                <button id="dropdownYear"
                    class="border border-blue-900 text-blue-900 font-bold text-[12px] rounded px-3 py-1 bg-white text-center flex justify-end items-center">
                    <span id="dropdownYearSelected" class="truncate text-center w-full">Year:</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
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

        </div>
    </div>
</div>



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
                    <p class="text-red-500 font-bold">2.70%</p>
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
    <div class="w-full h-full bg-white border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-4">
        <div id="chart"></div>

    </div>
</div><br>


<!-- Team Member Table -->
<div class="w-full bg-white border-gray-300 rounded-lg shadow-xl p-6">
    <div class="text-xl font-bold mb-4 text-blue-900 flex justify-between items-center">
        <p>Team Members</p>

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
                                <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
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
                                <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
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
                                <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
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
                                <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
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
                                <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
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
                                <svg class="w-3 h-3 ms-1.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </a>
                        </div>
                    </th>

                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                <tr class="bg-white hover:bg-gray-50 text-black text-center">
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4">Max</td>
                    <td class="px-6 py-4">10</td>
                    <td class="px-6 py-4">10</td>
                    <td class="px-6 py-4">0</td>
                    <td class="px-6 py-4">100.00%</td>
                    <td class="px-6 py-4">0</td>
                    <td class="px-6 py-4">10</td>
                    
                </tr>
            </tbody>
            <tbody>
                <tr class="bg-white hover:bg-gray-50 text-black text-center">
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4">Max</td>
                    <td class="px-6 py-4">10</td>
                    <td class="px-6 py-4">10</td>
                    <td class="px-6 py-4">0</td>
                    <td class="px-6 py-4">100.00%</td>
                    <td class="px-6 py-4">0</td>
                    <td class="px-6 py-4">10</td>
                   
                </tr>
            </tbody>
            <!-- Calulate -->
            <tbody>
                <tr class="bg-white border-t border-gray-400 hover:bg-gray-100 text-zinc-400 font-bold text-center">
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white  hover:bg-gray-50 text-black text-center">
                            <td class="px-3 py-3">1</td>
                            <td class="px-3 py-3">1</td>
                            <td class="px-3 py-3">Zumo</td>
                            <td class="px-3 py-3">1</td>
                            <td class="px-3 py-3">0</td>
                            <td class="px-3 py-3">1</td>
                            <td class="px-3 py-3">0</td>
                            
                        </tr>
                    </tbody>
                    <tbody>
                        <tr class="bg-white  hover:bg-gray-50 text-black text-center">
                            <td class="px-3 py-3">2</td>
                            <td class="px-3 py-3">1</td>
                            <td class="px-3 py-3">Ken</td>
                            <td class="px-3 py-3">2</td>
                            <td class="px-3 py-3">0</td>
                            <td class="px-3 py-3">1</td>
                            <td class="px-3 py-3">0</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Minor Case -->
        <div class="w-full bg-white border-gray-300 rounded-lg shadow-xl p-4">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-lg font-bold text-blue-900 text-[20px]">Minor Case</h2>
                
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
                            
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="bg-white hover:bg-gray-50 text-black text-center">
                            <td class="px-3 py-3">1</td>
                            <td class="px-3 py-3">Sprint 4</td>
                            <td class="px-3 py-3">Max</td>
                            <td class="px-3 py-3">8</td>
                            <td class="px-3 py-3">Yes</td>
                            <td class="px-3 py-3">0</td>
                            
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

            
            <!-- Extra Point Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-[10px] text-center text-gray-500 border-collapse">
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
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white hover:bg-gray-50 text-black text-center">
                            <td class="px-3 py-3">1</td>
                            <td class="px-3 py-3">Max</td>
                            <td class="px-3 py-3">4</td>

                            
                        </tr>
                        <tr class="bg-white  hover:bg-gray-50 text-black text-center">
                            <td class="px-3 py-3">2</td>
                            <td class="px-3 py-3">Luna</td>
                            <td class="px-3 py-3">1</td>

                            
                        </tr>
                    </tbody>


            </div>





            @endsection

            @section('javascripts')
            <script>
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