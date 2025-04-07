@extends('layouts.tester')

@section('contents')
<div class=" w-full flex justify-center">
    <div
        class="absolute top-[30%] left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gray-300 w-[1200px] h-[800px] rounded-lg shadow-md shadow-lg">
        <div class="flex flex-col gap-3 mt-10">
            <div class="flex flex-row justify-between gap-3">
                <div class="flex justify-start ml-[50px]">
                    <p class="font-bold text-3xl text-[var(--primary-color)]">All cards from Trello</p>
                </div>
                <div class="flex justify-end mr-[15px] mt-[5px]">
                    <p class="font-bold text-lg text-black items-center mr-[35px]">Last update: 03/01/2025, 15:42</p>
                </div>
            </div>
            {{-- Add to --}}
            <div class="flex flex-row justify-between gap-3 justify-center m-5">
                <div class="bg-white w-[1100px] h-[50px] rounded-lg shadow-md shadow-lg flex items-center">
                    <div class="flex flex-row items-center gap-3 ml-[50px]">
                        <img src="{{ asset('resources\Images\Icons\image-gallery (1).png') }}" alt=""
                            class="w-[30px] h-[30px]">
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
                    <div class="flex justify-end  ml-auto mr-[30px] gap-3 flex-row">
                        <button>
                            <img src="resources\Images\Icons\deleteIcon.png" alt=""
                                class="w-[30px] h-[30px]">
                        </button>

                        <button
                            class="bg-[var(--green-color-text)] w-[150px] h-[30px] rounded-md px-5 flex items-center justify-center gap-2">
                            <img src="resources\Images\Icons\checked.png" alt="" class="w-[20px] h-[20px]">
                            <p class="text-bold text-xl text-white font-semibold">Confirm</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Filter --}}
        <div class="flex flex-row justify-between gap-3 justify-center">
            <div class="bg-white w-[1100px] h-[50px] rounded-lg shadow-md shadow-lg">
                <div class="flex flex-row items-center gap-3 ml-[50px]">
                    <img src="{{ asset('resources\Images\Icons\filter (1).png') }}" alt=""
                        class="w-[30px] h-[30px]">
                    <p class="text-[var(--primary-color)] font-bold text-xl">Fillter</p>

                    {{-- Board dropdown --}}
                    <div class="relative ml-[8px]">
                        <button id="dropdownBoard"
                            class="border border-blue-900 text-blue-900 font-bold rounded px-2 py-1 w-40 bg-white text-center flex justify-between items-center">
                            <span id="dropdownYearSelected" class="truncate text-center w-full">Board</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        {{-- BoardMenu --}}
                        <div id="dropdownBoardMenu"
                            class="absolute hidden mt-2 w-40 bg-white border border-gray-300 rounded shadow-lg z-10">
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
                            class="border border-blue-900 text-blue-900 font-bold rounded px-2 py-1 w-40 bg-white text-center flex justify-between items-center">
                            <span id="dropdownListSelected" class="truncate text-center w-full">List</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        {{-- ListMenu --}}
                        <div id="dropdownListMenu"
                            class="absolute hidden mt-2 w-40 bg-white border border-gray-300 rounded shadow-lg z-10">
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
                            class="border border-blue-900 text-blue-900 font-bold rounded px-2 py-1 w-40 bg-white text-center flex justify-between items-center">
                            <span id="dropdownFullnameSelected" class="truncate text-center w-full">Fullname</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        {{-- Fullname Menu --}}
                        <div id="dropdownFullnameMenu"
                            class="absolute hidden mt-2 w-40 bg-white border border-gray-300 rounded shadow-lg z-10">
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

                    {{-- Clear button  --}}
                    <div class="flex justify-end  ml-auto mr-[30px] gap-3 flex-row">
                        <button
                            class="bg-gray-200 w-[100px] h-[30px] text-white rounded-md font-semibold text-md">Clear</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="relative sm:rounded-lg">
            <!-- Table -->
            <table class="w-full text-[12px] text-left rtl:text-right text-gray-500 dark:text-gray-300">
                <!-- Table header -->
            <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b dark:border-gray-300 text-center">
            <tr>
                <!-- Table header -->
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sprint
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Team
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Member
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Card Detail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Defect Detail
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-center">
                                Point
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>

                    </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 text-center text-black">
                       <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                         <!-- ลำดับ # -->
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            1
                        </th>
                         <!-- Sprint-->
                        <td class="px-6 py-4">
                            67-52
                        </td>
                         <!-- Actions -->
                        <td class="px-6 py-4">
                            Team 2
                        </td>
                        <!-- Member -->
                        <td class="px-6 py-4">
                            Steve
                        </td>
                         <!-- card Detail -->
                        <td class="px-6 py-4">
                            Lorem
                        </td>
                         <!-- Defect detail -->
                        <td class="px-6 py-4">
                            Lorem
                        </td>
                         <!-- Point -->
                        <td class="px-6 py-4">
                            3
                        </td>
                        <!-- Actions button-->
                        <td class="px-6 py-4 flex items-center justify-center space-x-2">

                        <a href=""> <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="" class="w-[35px] h-[35px]" onclick="" > </a>
                       <a href=""> <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="" class="w-[35px] h-[35px]" onclick="" ></a>
                         </td>
                    </tr>

                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 text-center text-black">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            2
                        </th>
                       <!-- Sprint-->
                       <td class="px-6 py-4">
                            67-52
                        </td>
                         <!-- Actions -->
                        <td class="px-6 py-4">
                            Team 2
                        </td>
                        <!-- Member -->
                        <td class="px-6 py-4">
                            Steve
                        </td>
                         <!-- card Detail -->
                        <td class="px-6 py-4">
                            Lorem
                        </td>
                         <!-- Defect detail -->
                        <td class="px-6 py-4">
                            Lorem
                        </td>
                         <!-- Point -->
                        <td class="px-6 py-4">
                            4
                        </td>
                         <!-- Actions button-->
                         <td class="px-6 py-4 flex items-center justify-center space-x-2">
                         <a href=""> <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="" class="w-[35px] h-[35px]" onclick="" > </a>
                        <a href=""> <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="" class="w-[35px] h-[35px]" onclick="" ></a>
                         </td>
                        </td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
