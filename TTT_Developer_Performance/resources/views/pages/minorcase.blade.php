@extends('layouts.tester')

@section('title')
    <title>Minor case</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Performance Review</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Minor Case</p>
    </div>
@endsection

@section('contents') 
<div class="text-xl font-bold mb-4 text-blue-900">
    <p>Minor Case</p>
</div>
<!-- รอใส่ filter dropdown --> 
<div class="flex gap-4 ml-4">
        <select class="border border-blue-900 text-blue-900 font-bold rounded px-6 py-3 w-40 bg-white">
            <option value="2568" class="text-black">2568</option>
            <option value="2567" class="text-black">2567</option>
        </select>
        <select class="border border-blue-900 text-blue-900 font-bold rounded px-6 py-3 w-40 bg-white">
            <option value="Sprint 01" class="text-black">Sprint 01</option>
            <option value="Sprint 02" class="text-black">Sprint 02</option>
        </select>
        <select class="border border-blue-900 text-blue-900 font-bold rounded px-6 py-3 w-40 bg-white">
            <option value="All team" class="text-black">All team</option>
            <option value="Team 1" class="text-black">Team 1</option>
            <option value="Team 2" class="text-black">Team 2</option>
        </select>
        <select class="border border-blue-900 text-blue-900 font-bold rounded px-6 py-3 w-40 bg-white">
            <option value="Member" class="text-black">Member</option>
            <option value="Steve" class="text-black">Steve</option>
            <option value="Luna" class="text-black">Luna</option>
        </select>
        <button class="flex items-center bg-blue-900 text-white px-4 py-2 rounded">
            <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" alt="Add" class="w-5 h-5 mr-2">
            Add New
        </button>
    </div>
    <br>
<!-- end -->
<div class="relative overflow-x-auto sm:rounded-lg">
    <!-- Table -->
    <table class="w-full text-[12px] text-left rtl:text-right text-gray-500 dark:text-gray-300">
        <!-- Table header -->
    <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b dark:border-gray-300"> 
    <tr>
        <!-- Table header -->
                <th scope="col" class="px-6 py-3 text-center">
                    #
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Sprint
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Team
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Member
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Card Detail
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Defect Detail
                </th>

                <th scope="col" class="px-6 py-3 text-center">
                    <div class="flex items-center">
                        Point
                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                        </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Actions
                </th>

            </tr>
        </thead>
        <!-- Table body -->
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
               <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                 <!-- ลำดับ # -->
                <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                    1
                </th>
                 <!-- Sprint-->
                <td class="px-6 py-4 text-center">
                    67-52
                </td>
                 <!-- Actions -->
                <td class="px-6 py-4 text-center">
                    Team 2
                </td>
                <!-- Member -->
                <td class="px-6 py-4 text-center">
                    Steve
                </td>
                 <!-- card Detail -->
                <td class="px-6 py-4 text-center">
                    Lorem
                </td>
                 <!-- Defect detail -->
                <td class="px-6 py-4 text-center">
                    Lorem
                </td>
                 <!-- Point -->
                <td class="px-6 py-4 text-center">
                    3
                </td>
                <!-- Actions button-->               
                <td class="px-6 py-4 flex items-center justify-start space-x-2">
                
                <a href=""> <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="" class="w-[35px] h-[35px]" onclick="" > </a>
               <a href=""> <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="" class="w-[35px] h-[35px]" onclick="" ></a> 
                 </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                    2
                </th>
               <!-- Sprint-->
               <td class="px-6 py-4 text-center">
                    67-52
                </td>
                 <!-- Actions -->
                <td class="px-6 py-4 text-center">
                    Team 2
                </td>
                <!-- Member -->
                <td class="px-6 py-4 text-center">
                    Steve
                </td>
                 <!-- card Detail -->
                <td class="px-6 py-4 text-center">
                    Lorem
                </td>
                 <!-- Defect detail -->
                <td class="px-6 py-4 text-center">
                    Lorem
                </td>
                 <!-- Point -->
                <td class="px-6 py-4 text-center">
                    4
                </td>
                 <!-- Actions button-->               
                 <td class="px-6 py-4 flex items-center justify-start space-x-2">
                 <a href=""> <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="" class="w-[35px] h-[35px]" onclick="" > </a>
                <a href=""> <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="" class="w-[35px] h-[35px]" onclick="" ></a> 
                 </td>
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
