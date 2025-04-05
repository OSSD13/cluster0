@extends('layouts.tester')

@section('title')
    <title>Revision History</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Setting</h2>
        <p class="font-bold text-neutral-400">Revision History</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <p class="text-2xl font-bold text-blue-900">Revision History</p>

            <!-- Dropdown Filters -->
            <div class="flex gap-4">
                <!-- Year Dropdown -->
                <div class="w-32 relative">
                    <div class="bg-white border-2 border-blue-900 text-sm font-bold text-blue-900 rounded-md px-3 py-1 cursor-pointer flex justify-between items-center"
                        onclick="toggleDropdown('yearDropdown')">
                        Year
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div id="yearDropdown"
                        class="absolute z-10 mt-1 bg-white border border-gray-300 rounded-md shadow-md w-full hidden">
                        @foreach ([2566, 2567, 2568] as $year)
                            <label class="block px-4 py-2 cursor-pointer">
                                <input type="checkbox" class="mr-2 text-blue-600 year-option"> {{ $year }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Sprint Dropdown -->
                <div class="w-32 relative">
                    <div class="bg-white border-2 border-blue-900 text-sm font-bold text-blue-900 rounded-md px-3 py-1 cursor-pointer flex justify-between items-center"
                        onclick="toggleDropdown('sprintDropdown')">
                        Sprint
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div id="sprintDropdown"
                        class="absolute z-10 mt-1 bg-white border border-gray-300 rounded-md shadow-md w-full hidden">
                        @foreach ([1, 2, 3, 4] as $sprint)
                            <label class="block px-4 py-2 cursor-pointer">
                                <input type="checkbox" class="mr-2 text-blue-600 sprint-option"> {{ $sprint }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Version Dropdown -->
                <div class="w-32 relative">
                    <div class="bg-white border-2 border-blue-900 text-sm font-bold text-blue-900 rounded-md px-3 py-1 cursor-pointer flex justify-between items-center"
                        onclick="toggleDropdown('versionDropdown')">
                        Version
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div id="versionDropdown"
                        class="absolute z-10 mt-1 bg-white border border-gray-300 rounded-md shadow-md w-full hidden">
                        @foreach ([1, 2, 3] as $version)
                            <label class="block px-4 py-2 cursor-pointer">
                                <input type="checkbox" class="mr-2 text-blue-600 version-option"> {{ $version }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- รอใส่ filter dropdown -->
        <div class="relative overflow-x-auto sm:rounded-lg">

            <!-- Table -->
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                <!-- Table header -->
                <thead class="border-t border-gray-400 text-l text-gray-400 border-b dark:border-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">#</th>
                        <th scope="col" class="px-6 py-3 text-center">Editor</th>
                        <th scope="col" class="px-6 py-3 text-center">Sprint</th>
                        <th scope="col" class="px-6 py-3 text-center">Version</th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <div class="flex items-center justify-center">
                                Last update
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                    <tr class="bg-white text-black ">
                        <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                        <!-- ลำดับ # -->
                        <th scope="row" class="px-6 py-4 font-medium text-center whitespace-nowrap">1</th>
                        <td class="px-6 py-4 text-center">You edited</td>
                        <td class="px-6 py-4 text-center">67-50</td>
                        <td class="px-6 py-4 text-center">1</td>
                        <td class="px-6 py-4 text-center">30/08/2024 17:55</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center">
                                <button class="bg-[#FFA533] text-white py-1 px-1 rounded flex items-center">
                                    <img src="{{ asset('resources/Images/Icons/eye.png') }}" alt=""
                                        class="w-[20px] h-[20px] mr-2">
                                    <span>View</span>
                                </button>
                            </div>
                        </td>
                    <tr class="bg-white text-black ">
                        <th scope="row" class="px-6 py-4 font-medium text-center whitespace-nowrap">1</th>
                        <td class="px-6 py-4 text-center">Sumo</td>
                        <td class="px-6 py-4 text-center">67-50</td>
                        <td class="px-6 py-4 text-center">2</td>
                        <td class="px-6 py-4 text-center">15/10/2024 12:55</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center">
                                <button class="bg-[#FFA533] text-white py-1 px-1 rounded flex items-center">
                                    <img src="{{ asset('resources/Images/Icons/eye.png') }}" alt=""
                                        class="w-[20px] h-[20px] mr-2">
                                    <span>View</span>
                                </button>
                            </div>
                        </td>
                    <tr class="bg-white text-black ">
                        <th scope="row" class="px-6 py-4 font-medium text-center whitespace-nowrap">1</th>
                        <td class="px-6 py-4 text-center">Hade</td>
                        <td class="px-6 py-4 text-center">67-50</td>
                        <td class="px-6 py-4 text-center">3</td>
                        <td class="px-6 py-4 text-center">03/12/2024 09:55</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center">
                                <button class="bg-[#FFA533] text-white py-1 px-1 rounded flex items-center">
                                    <img src="{{ asset('resources/Images/Icons/eye.png') }}" alt=""
                                        class="w-[20px] h-[20px] mr-2">
                                    <span>View</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('javascripts')
    <script>
        // ฟังก์ชันสำหรับเปิด/ปิด Dropdown
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('hidden');
        }

        // ปิด dropdown เมื่อคลิกที่พื้นที่อื่น
        document.addEventListener('click', function(event) {
            const dropdowns = ['yearDropdown', 'sprintDropdown', 'versionDropdown'];
            dropdowns.forEach(id => {
                const dropdown = document.getElementById(id);
                const button = dropdown.previousElementSibling;
                if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
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
