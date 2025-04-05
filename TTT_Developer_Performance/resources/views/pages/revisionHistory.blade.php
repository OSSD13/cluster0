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
    <div class="text-2xl font-bold mb-4 text-blue-900">
        <p>Revision History</p>
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
