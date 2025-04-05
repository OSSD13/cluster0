@extends('layouts.tester')

@section('title')
    <title>Manage Users</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Setting</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Access control</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white rounded-lg shadow-md p-6 shadow-lg">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-blue-700">Manage Users</h2>
            <div></div>
            <input type="text" placeholder="Search" class="px-3 py-2 border border-black rounded-lg shadow-sm w-64 placeholder:font-bold">
        </div>
        <!-- รอใส่ filter dropdown -->
        <div class="relative overflow-x-auto sm:rounded-lg">
            <!-- Table -->
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                <!-- Table header -->
            <thead class="border-t border-gray-400 text-l text-gray-400 border-b dark:border-gray-300">
            <tr>
                        <!-- Table header -->
                        <th class="px-4 py-2 text-center">#</th>
                        <th class="px-4 py-2 text-center">Name</th>
                        <th class="px-4 py-2 text-center">Username</th>
                        <th class="px-4 py-2 text-center">Email</th>
                        <th class="px-4 py-2 text-center w-45">Trello Full Name</th>
                        <th class="px-4 py-2 text-center">Password</th>
                        <th class="px-4 py-2 text-center">Team</th>
                        <th class="px-4 py-2 text-center">Access</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                    <tr class="bg-white text-black">
                       <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                         <!-- ลำดับ # -->
                        <th scope="row" class="text-center px-6 py-4 font-medium text-black whitespace-nowrap ">
                            1
                        </th>
                         <!-- Name -->
                        <td class="px-6 py-4 text-center">
                            Max
                        </td>
                         <!-- Username -->
                        <td class="px-6 py-4 text-center">
                            Maxttt1234
                        </td>
                        <!-- Email -->
                        <td class="px-6 py-4 text-center">
                            max@gmail.com
                        </td>
                         <!-- Trello full name -->
                        <td class="px-6 py-4 text-center">
                            Max123
                        </td>
                         <!-- Password -->
                        <td class="px-6 py-4 text-center">
                            <button class="w-25 bg-[#00408e] hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded" style="border-radius: 7px;">Reset</button>
                        </td>
                         <!-- Team -->
                         <td class="py-4 text-center">
                            <div class="relative">
                                <select class="w-32 border-2 p-2 rounded-lg appearance-none pr-12 text-blue-900 text-center
                                              focus:outline-none focus:ring-2 focus:ring-[#00408e] focus:border-[#00408e]
                                              hover:bg-blue-100"
                                    style="border-color: #00408e;
                                           background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22%2300408e%22><path d=%22M7 10l5 5 5-5z%22 /></svg>');
                                           background-repeat: no-repeat;
                                           background-position: right 1rem center;
                                           background-size: 1.2rem;">
                                    <option class="text-center text-blue-900 bg-white">-</option>
                                    <option class="text-center text-blue-900 bg-white">Team 1</option>
                                    <option class="text-center text-blue-900 bg-white">Team 2</option>
                                    <option class="text-center text-blue-900 bg-white">Team 3</option>
                                </select>
                            </div>
                        </td>
                        <td class="py-4 text-center">
                            <div class="relative">
                                <select class="w-32 border-2 p-2 rounded-lg appearance-none pr-12 text-blue-900 text-center
                                              focus:outline-none focus:ring-2 focus:ring-[#00408e] focus:border-[#00408e]
                                              hover:bg-blue-100"
                                    style="border-color: #00408e;
                                           background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22%2300408e%22><path d=%22M7 10l5 5 5-5z%22 /></svg>');
                                           background-repeat: no-repeat;
                                           background-position: right 1rem center;
                                           background-size: 1.2rem;">
                                    <option class="text-center text-blue-900 bg-white">-</option>
                                    <option class="text-center text-blue-900 bg-white">Developer</option>
                                    <option class="text-center text-blue-900 bg-white">Tester</option>
                                </select>
                            </div>
                        </td>
                        <!-- Actions button-->
                        <td class="px-6 py-4 flex items-center justify-center space-x-2">
                        <a href=""> <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="" class="w-[35px] h-[35px]" onclick="" ></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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
