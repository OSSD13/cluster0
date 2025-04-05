@extends('layouts.tester')

@section('title')
    <title>Dashboard</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Dashboard</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Overview</p>
    </div>
@endsection

@section('filter')
    {{-- filter --}}
    <div class="flex item-center justify-between">
        <div class="bg-white w-full h-[70px] rounded-lg shadow-md shadow-lg flex items-center">
            <div class="gap-4 flex flex-row items-center w-full justify-between mx-10">
                <div class="flex justify-start items-center gap-2 ">
                    <img src="/resources/Images/Icons/filter (1).png" alt="" class="w-[40px] h-[40px]">
                    <label class="text-[var(--primary-color)] text-2xl"><strong>Filter</strong></label>
                </div>
                <div class="flex justify-end gap-4 ml-4">
                    <!-- Year Dropdown -->
                    <div class="relative">
                        <button id="dropdownButton"
                            class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
                            <span id="dropdownSelected" class="truncate text-center w-full">Year:</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div id="dropdownMenu"
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

                    <!-- Sprint Dropdown -->
                    <div class="relative">
                        <button id="dropdownSprint"
                            class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
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
                                <input type="checkbox" id="sprint01" value="Sprint 01" class="mr-2">
                                <label for="sprint01" class="text-black">Sprint 01</label>
                            </div>
                            <div class="flex items-center px-4 py-2">
                                <input type="checkbox" id="sprint02" value="Sprint 02" class="mr-2">
                                <label for="sprint02" class="text-black">Sprint 02</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- show point 3 type --}}
    <div class="my-4 flex flex-row gap-4">

        {{-- Point All --}}
        <div class="basis-1/4 bg-white h-[90px] w-full rounded-lg shadow-md shadow-lg">
            <div class="bg-[var(--primary-color-yellow)] w-full h-[30px] rounded-t-lg flex flex-col">
                <div class="mt-1 flex justify-center items-center gap-2">
                    <label class="text-white font-bold">Point All</label>
                </div>
                <div class="flex items-center gap-4 w-full mt-3">
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointAllNumber" class="font-bold">37</p>
                    </div>
                    <div class="border-l-2 border-black h-[30px]"></div>
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointAllPercent" class="font-bold text-[var(--yellow-color-text)]">100%</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Point Pass --}}
        <div class="basis-1/4 bg-white h-[90px] w-full rounded-lg shadow-md shadow-lg">
            <div class="bg-[var(--primary-color-green)] w-full h-[30px] rounded-t-lg flex flex-col">
                <div class="mt-1 flex justify-center items-center gap-2">
                    <label class="text-white font-bold">Point Pass</label>
                </div>
                <div class="flex items-center gap-4 w-full mt-3">
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointPassNumber" class="font-bold">36</p>
                    </div>
                    <div class="border-l-2 border-black h-[30px]"></div>
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointPassPercent" class="font-bold text-[var(--green-color-text)]">97.30%</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Point Fail --}}
        <div class="basis-1/4 bg-white h-[90px] w-full rounded-lg shadow-md shadow-lg">
            <div class="bg-[var(--primary-color-red)] w-full h-[30px] rounded-t-lg flex flex-col">
                <div class="mt-1 flex justify-center items-center gap-2">
                    <label class="text-white font-bold">Point Fail</label>
                </div>
                <div class="flex items-center gap-4 w-full mt-3">
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointPassNumber" class="font-bold">3</p>
                    </div>
                    <div class="border-l-2 border-black h-[30px]"></div>
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointPassPercent" class="font-bold text-[var(--red-color-text)]">8.10%</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Team Amoute --}}
        <div class="basis-1/4 bg-white h-[90px] w-full rounded-lg shadow-md shadow-lg">
            <div class="bg-[var(--primary-color)] w-full h-[30px] rounded-t-lg flex flex-col">
                <div class="mt-1 flex justify-center items-center gap-2">
                    <label class="text-white font-bold">Team Amount</label>
                </div>
            </div>
            <div class="flex items-center gap-4 w-full mt-3">
                <div class="flex items-center justify-center w-full h-full">
                    <p id="teamAmouteNum" class="font-bold">3</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('dashboard')
    <div class="my-3 flex flex-row gap-4 grid grid-cols-3">
        <div class="col-span-2 bg-white h-full w-full rounded-lg shadow-md shadow-lg">
            <div id="columnChart"></div>
        </div>

        <div class="bg-white h-full rounded-lg shadow-md shadow-lg flex flex-col items-center">
            <div id="pieChart"></div>
            <div class="flex flex-col h-full justify-center items-center gap-2">
                <div
                    class="bg-[var(--primary-color-green)] w-[180px] h-[35px] rounded-lg flex justify-between items-center">
                    <div
                        class="bg-[var(--primary-color-green)] w-[90px] h-[35px] rounded-lg flex justify-center items-center">
                        <p class="text-white font-bold">Pass</p>
                    </div>

                    <div class="bg-white w-[90px] h-[30px] rounded-lg flex justify-center items-center m-1">
                        <p class="text-[var(--primary-color-green)] font-bold">36</p>
                    </div>
                </div>

                <div class="bg-[var(--primary-color-red)] w-[180px] h-[35px] rounded-lg flex justify-between items-center">
                    <div
                        class="bg-[var(--primary-color-red)] w-[90px] h-[35px] rounded-lg flex justify-center items-center">
                        <p class="text-white font-bold">Fail</p>
                    </div>

                    <div class="bg-white w-[90px] h-[30px] rounded-lg flex justify-center items-center m-1">
                        <p class="text-[var(--primary-color-red)] font-bold">3</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('filter2')
    <div class="flex item-center justify-between">
        <div class="bg-white w-full h-[70px] rounded-lg shadow-md shadow-lg flex items-center">
            <div class="gap-4 flex flex-row items-center w-full justify-between mx-10">
                <div class="flex justify-start items-center gap-2 ">
                    <img src="/resources/Images/Icons/filter (1).png" alt="" class="w-[40px] h-[40px]">
                    <label class="text-[var(--primary-color)] text-2xl"><strong>Filter</strong></label>
                </div>
                <div class="flex justify-end gap-4 ml-4">
                    <div class="relative">
                        <button id="dropdownTeam"
                            class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
                            <span id="dropdownTeamSelected" class="truncate text-center w-full">Team:</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contents')
    <div class="my-2 flex flex-row gap-2 item-center w-full">
        <div class="basis-1/2 bg-white rounded-lg shadow-md shadow-lg">
            <div class="m-5">
                <p class="text-[var(--primary-color)] font-bold flex justify-start text-2xl m-5">Individual Point Details
                </p>
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <!-- Table -->
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                        <!-- Table header -->
                        <thead
                            class="border-t border-gray-400 text-l text-gray-400 uppercase border-b dark:border-gray-300">
                            <tr>
                                <!-- Table header -->
                                <th scope="col" class="px-6 py-3 text-center">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Member
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    <div class="flex items-center justify-center">
                                        Amount
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    <div class="flex items-center justify-center">
                                        Test Pass
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>

                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    <div class="flex items-center justify-center">
                                        Test Fail
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                                <!-- ลำดับ # -->
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    1
                                </th>
                                <!-- Member-->
                                <td class="px-6 py-4 text-center">
                                    Alex
                                </td>
                                <!-- Amount -->
                                <td class="px-6 py-4 text-center">
                                    11
                                </td>
                                <!-- Test Pass -->
                                <td class="px-6 py-4 text-center">
                                    11
                                </td>
                                <!-- Test Fail -->
                                <td class="px-6 py-4 text-center">
                                    0
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                                <!-- ลำดับ # -->
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    2
                                </th>
                                <!-- Member-->
                                <td class="px-6 py-4 text-center">
                                    Alex
                                </td>
                                <!-- Amount -->
                                <td class="px-6 py-4 text-center">
                                    11
                                </td>
                                <!-- Test Pass -->
                                <td class="px-6 py-4 text-center">
                                    11
                                </td>
                                <!-- Test Fail -->
                                <td class="px-6 py-4 text-center">
                                    0
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                                <!-- ลำดับ # -->
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    3
                                </th>
                                <!-- Member-->
                                <td class="px-6 py-4 text-center">
                                    Alex
                                </td>
                                <!-- Amount -->
                                <td class="px-6 py-4 text-center">
                                    11
                                </td>
                                <!-- Test Pass -->
                                <td class="px-6 py-4 text-center">
                                    11
                                </td>
                                <!-- Test Fail -->
                                <td class="px-6 py-4 text-center">
                                    0
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                                <!-- ลำดับ # -->
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    4
                                </th>
                                <!-- Member-->
                                <td class="px-6 py-4 text-center">
                                    Alex
                                </td>
                                <!-- Amount -->
                                <td class="px-6 py-4 text-center">
                                    11
                                </td>
                                <!-- Test Pass -->
                                <td class="px-6 py-4 text-center">
                                    11
                                </td>
                                <!-- Test Fail -->
                                <td class="px-6 py-4 text-center">
                                    0
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                                <!-- ลำดับ # -->
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    5
                                </th>
                                <!-- Member-->
                                <td class="px-6 py-4 text-center">
                                    Alex
                                </td>
                                <!-- Amount -->
                                <td class="px-6 py-4 text-center">
                                    11
                                </td>
                                <!-- Test Pass -->
                                <td class="px-6 py-4 text-center">
                                    11
                                </td>
                                <!-- Test Fail -->
                                <td class="px-6 py-4 text-center">
                                    0
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="basis-1/2 bg-white rounded-lg shadow-md shadow-lg">
            <div class="m-5">
                <p class="text-[var(--primary-color)] font-bold flex justify-start text-2xl m-5">Total Points by Individual
                    in Team
                </p>
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <!-- Table -->
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                        <!-- Table header -->
                        <thead
                            class="border-t border-gray-400 text-l text-gray-400 uppercase border-b dark:border-gray-300">
                            <tr>
                                <!-- Table header -->
                                <th scope="col" class="px-6 py-3 text-center">
                                    #
                                </th>
                                <th scope="col" class="px-8 py-3 text-center">
                                    Team
                                </th>
                                <th scope="col" class="px-3 py-3 text-center">
                                    Member
                                </th>
                                <th scope="col" class="px-3 py-3 text-center">
                                    <div class="flex items-center justify-center">
                                        Point All
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                                <!-- ลำดับ # -->
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white text-center">
                                    1
                                </th>
                                <!-- Team-->
                                <td class="px-6 py-4 text-center">
                                    Team1
                                </td>
                                <!-- Member -->
                                <td class="px-6 py-4 text-center">
                                    Max
                                </td>
                                <!-- Point All -->
                                <td class="px-6 py-4 text-center">
                                    8
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                                <!-- ลำดับ # -->
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white text-center">
                                    2
                                </th>
                                <!-- Team-->
                                <td class="px-6 py-4 text-center">
                                    Team1
                                </td>
                                <!-- Member -->
                                <td class="px-6 py-4 text-center">
                                    Max
                                </td>
                                <!-- Point All -->
                                <td class="px-6 py-4 text-center">
                                    8
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                                <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                                <!-- ลำดับ # -->
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    3
                                </th>
                                <!-- Team-->
                                <td class="px-6 py-4 text-center">
                                    Team1
                                </td>
                                <!-- Member -->
                                <td class="px-6 py-4 text-center">
                                    Max
                                </td>
                                <!-- Point All -->
                                <td class="px-6 py-4 text-center">
                                    8
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                                <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                                <!-- ลำดับ # -->
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    4
                                </th>
                                <!-- Team-->
                                <td class="px-6 py-4 text-center">
                                    Team1
                                </td>
                                <!-- Member -->
                                <td class="px-6 py-4 text-center">
                                    Max
                                </td>
                                <!-- Point All -->
                                <td class="px-6 py-4 text-center">
                                    8
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                                <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                                <!-- ลำดับ # -->
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                    5
                                </th>
                                <!-- Team-->
                                <td class="px-6 py-4 text-center">
                                    Team1
                                </td>
                                <!-- Member -->
                                <td class="px-6 py-4 text-center">
                                    Max
                                </td>
                                <!-- Point All -->
                                <td class="px-6 py-4 text-center">
                                    8
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script>
        // Sprint dropdown
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

        // Team dropdown
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

        // Year dashboard
        var options = {
            series: [{
                name: 'Net Profit',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'Revenue',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Free Cash Flow',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    borderRadius: 0,
                    borderRadiusApplication: 'end'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
                title: {
                    text: '$ (thousands)'
                }
            },
            fill: {
                colors: ['#FFA533', '#60A563', '#DC5959']
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };

        var columnChart = new ApexCharts(document.querySelector("#columnChart"), options);
        columnChart.render();

        // Pie chart

        var options = {
            series: [44, 55],
            chart: {
                type: 'donut',
            },
            labels: ['Pass', 'Fail'],
            colors: ['#60A563', '#DC5959'],
            legend: {
                position: 'bottom'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var pieChart = new ApexCharts(document.querySelector("#pieChart"), options);
        pieChart.render();
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
